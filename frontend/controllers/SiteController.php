<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\EmployeeSignup;
use frontend\models\ContactForm;
use frontend\models\EmployeePreferences;
use frontend\models\EmployeeSkills;
use frontend\models\EmployeeProjects;
use frontend\models\EmployeeEmployer;
use frontend\models\EmployeeLanguages;
use frontend\models\EmployeeEducation;
use frontend\models\EmployerJobpostings;
use frontend\models\EmployeeJobsearch;
use frontend\models\EmployeeJobapplied;
use yii\helpers\ArrayHelper;

use frontend\models\RolesModel;


use common\models\User;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\db\Query ;
use frontend\models\JobSkills;
use yii\data\ArrayDataProvider;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
  /*   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    } */
    
    public function behaviors()
    {
    
    	$permissionsArray = [''];
    	//print_r(RolesModel::getRole());exit();
    	if(RolesModel::getRole() == 3)
    	{
    		$permissionsArray = ['index','login','logout','contact','about','signup',
    				'viewprofile','request-password-reset','reset-password','applylist','applyjobajax','myjobs'
    		];
    	}
    	else {
    		$permissionsArray = ['index','login','logout','contact','about','signup','request-password-reset','reset-password'];
    	}
    
    
    	//print_r($permissionsArray);exit();
    	return [
    			'verbs' => [
    					'class' => VerbFilter::className(),
    					'actions' => [
    							'delete' => ['post'],
    					],
    			],
    			'access' => [
    					'class' => AccessControl::className(),
    					'only' => [
    							'index','login','logout','contact','about','signup','viewprofile','request-password-reset','reset-password','applylist','applyjobajax','myjobs'
    
    					],
    					'rules' => [
    							[
    									'actions' => $permissionsArray,
    									'allow' => true,
    									'matchCallback' => function ($rule, $action) {
    									
    									if((RolesModel::getRole() == 3) || (RolesModel::getRole() == 0))
    									{
    											
    										return true;
    									}
    									}
    									],
    									[
    											'denyCallback' => function ($rule, $action) {
    											
    											$this->redirect(Yii::$app->urlManager->createUrl(['employees-login']));
    											}
    											]
    											]
    											]
    											];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
        		'auth' => [
        				'class' => 'yii\authclient\AuthAction',
        				'successCallback' => [$this, 'successCallback'],
        				//'successUrl' => $this->successUrl
        		],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function successCallback($client) {
    	ini_set('allow_url_fopen',1);
    	$attributes = ( object ) $client->getUserAttributes ();
    
    	$clientClass = get_class ( $client );
    	$facebookidnew = '';
    	$facebookidnewemail = '';
    	$validUser = false;
    	switch ($clientClass) {
    		case "yii\authclient\clients\Facebook" :
    
    			if (isset ( $attributes )) {
    					
    				$firstName = $attributes->first_name;
    				$lastName = $attributes->last_name;
    				$facebookidnew = $attributes->id;
    				$facebookidnewemail = $attributes->email;
    				if(isset($attributes->email) && ($attributes->email != ''))
    				{
    					$email = $attributes->email;
    				}
    				else {
    					$email = $attributes->id;
    				}
    				$accessToken = $attributes->id;
    					
    				$providerId = 1;
    				$validUser = true;
    			}
    			break;
    				
    		case "yii\authclient\clients\GoogleOAuth" :
    
    			if (isset ( $attributes->emails [0] ['value'] )) {
    				$firstName = $attributes->name ['givenName'];
    				$lastName = $attributes->name ['familyName'];
    				$email = $attributes->emails [0] ['value'];
    				$accessToken = $attributes->id;
    					
    				$providerId = 2;
    				$validUser = true;
    			}
    			break;
    			
    			case "yii\authclient\clients\Twitter" :
    			
    				if (isset ( $attributes->email )) {
    					$firstName = $attributes->first_name;
    					$lastName = $attributes->last_name;
    					$email = $attributes->emails;
    					$accessToken = $attributes->id;
    						
    					$providerId = 3;
    					$validUser = true;
    				}
    				break;
    			case "yii\authclient\clients\LinkedInOAuth":
    				
    				if (isset ( $attributes->email )) {    					 
    					$firstName = $attributes->first_name;
    					$lastName = $attributes->last_name;
    					$email = $attributes->email;
    					$accessToken = $attributes->id;
    				
    					$providerId = 4;
    					$validUser = true;
    				}
    				break;
    		    				
    		default :
    			;
    			break;
    	}
    	$model = new LoginForm ();
    	if ($email = '') {
    			
    		$socialInfo = array ();
    		$socialInfo ['email'] = $email;
    		$socialInfo ['firstName'] = $firstName;
    		$socialInfo ['lastName'] = $lastName;
    		$socialInfo ['facebookidnew'] = $facebookidnew;
    		$socialInfo ['facebookidnewemail'] = $facebookidnewemail;
    			   			
    	}
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	$this->layout= '@app/views/layouts/main';
    	$model = new EmployeeJobapplied();
    	$searchModel = new EmployeeJobsearch();    	
    	$skillsdata = JobSkills::find()
    	->select('skill_name')
    	->all();
    	 
    	$skillsInfo = array();
    	if(!empty($skillsdata))
    	{
    		foreach ($skillsdata as $skillnew)
    		{
    			//echo rtrim($skillnew->skills,",");
    			$aryconvertskill = explode(",",rtrim($skillnew->skill_name,","));
    			for($k=0; $k < count($aryconvertskill); $k++)
    			{
    				$skillsInfo["$aryconvertskill[$k]"] = $aryconvertskill[$k];
    			}
    		}
    	}
    	else {
    		$skillsInfo =[''];
    	}
    	
    	$companydata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name');
    	if($companydata)
    	{
    		$companydata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name');
    	}
    	else {
    		$companydata = [''];
    	}
    	
    	
    	$desdata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'designation','designation');
    	if($desdata)
    	{
    		$desdata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'designation','designation');
    	}
    	else {
    		$desdata = [''];
    	}
    	
    	
    	$expdata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience');
    	if($expdata)
    	{
    		$expdata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience');
    	}
    	else {
    		$expdata =[''];
    	}
    	//print_r($expdata);exit();
    	
    	
    	
    	
    	if(Yii::$app->emplyoee->emplyoeeid != '')
    	{
    		
    		$allquerys = Yii::$app->request->queryParams;
    		if(array_key_exists("EmployeeJobsearch",$allquerys))
    		{
    			$allquerysnew = $allquerys['EmployeeJobsearch'];
    		//print_r( Yii::$app->request->queryParams);exit();
    		if(array_key_exists("company_name",$allquerysnew) || array_key_exists("designation",$allquerysnew) ||array_key_exists("Min_Experience",$allquerysnew) ||array_key_exists("skills",$allquerysnew))
    		{
    			//echo 'hello';exit();
    			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    		}
    		else {
    			
    			$skillsInfonew = EmployeeSkills::find()->select(['skillname'])->where(['userid' => Yii::$app->emplyoee->emplyoeeid ])->all();
    			if(!empty($skillsInfonew))
    			{
    				//echo 'hello2';exit();
    				$paramInfo = Yii::$app->request->queryParams;
    				$paramInfo['r'] = 'site/index';    				
    				$paramInfo['EmployeeJobsearch']['skills'] = $skillsInfonew;
    				for($m=0; $m < count($skillsInfonew); $m++)
    				{
    					$paramInfo['EmployeeJobsearch']['skills'][$m] = $skillsInfonew[$m]['skillname'];
    				}
    				//print_r($paramInfo);exit();
    				$dataProvider = $searchModel->search($paramInfo);
    			}
    			else 
    			{
    				//echo 'hello3';exit();
    				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    			}
    		}
    		}
    		else {


    			$skillsInfonew = EmployeeSkills::find()->select(['skillname'])->where(['userid' => Yii::$app->emplyoee->emplyoeeid ])->all();
    			if(!empty($skillsInfonew))
    			{
    				//echo 'hello2';exit();
    				$paramInfo = Yii::$app->request->queryParams;
    				$paramInfo['r'] = 'site/index';
    				for($m=0; $m < count($skillsInfonew); $m++)
    				{
    				$paramInfo['EmployeeJobsearch']['skills'][$m] = $skillsInfonew[$m]['skillname'];
    				}
    				//print_r($paramInfo['EmployeeJobsearch']['skills']);exit();
    				$dataProvider = $searchModel->search($paramInfo);
    			}
    			else
    			{
    				//echo 'hello3';exit();
    				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    			}
    			
    		}
    	}
    	else 
    	{
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	}
    	$spotlightData = EmployerJobpostings::find()->where(['status' => 'Active'])->orderBy('id')->limit(10);
    	$spotlightDataProvider = new ActiveDataProvider([
    			'pagination' => false,
    			'query' => $spotlightData,
    	]);
    	return $this->render('index', [
    			'dataProvider' => $dataProvider,
    			'searchModel' => $searchModel,
    			'skillsInfo' => $skillsInfo,
    			'companydata' => $companydata,
    			'desdata' => $desdata,
    			'expdata' => $expdata,
    			'spotlightDataProvider' => $spotlightDataProvider
    	]);
    	}
    	

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
    	$model = new LoginForm();
    	$this->layout= '@app/views/layouts/innerpagemain';
    	if ((! \Yii::$app->user->isGuest) && (Yii::$app->emplyoee->emplyoeeroleid ==3)) {
    		//return $this->goHome ();
    		return Yii::$app->getResponse ()->redirect ( [
    				'employees'
    				] );
    	}
    	
        

        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        if ($model->user->roleid == 2) {
				$model->addError('username','You dont have emplyoee credentials');
				
				return $this->render ( 'login', [ 
					'model' => $model 
			] );
			} 
			else if ($model->user->roleid == 3) {
				\Yii::$app->session->set('user.emplyoeeid',Yii::$app->user->identity->id);
				\Yii::$app->session->set('user.emplyoeeusername',Yii::$app->user->identity->username);
				\Yii::$app->session->set('user.emplyoeepassword_hash',Yii::$app->user->identity->password_hash);
				\Yii::$app->session->set('user.emplyoeepassword_reset_token',Yii::$app->user->identity->password_reset_token);
				\Yii::$app->session->set('user.emplyoeeemail',Yii::$app->user->identity->email);
				\Yii::$app->session->set('user.emplyoeeauth_key',Yii::$app->user->identity->auth_key);
				
				\Yii::$app->session->set('user.emplyoeestatus',Yii::$app->user->identity->status);
				\Yii::$app->session->set('user.emplyoeecreated_at',Yii::$app->user->identity->created_at);
				\Yii::$app->session->set('user.emplyoeeupdated_at',Yii::$app->user->identity->updated_at);
				\Yii::$app->session->set('user.emplyoeeroleid',Yii::$app->user->identity->roleid);
				
				
				$session = Yii::$app->session;
				$prevousurlgetinfo = $session->get('previousredirecturl');
				//print_r($prevousurlgetinfo);exit();
				if ($prevousurlgetinfo != '')
				{
					unset($session['previousredirecturl']);
					return $this->redirect($prevousurlgetinfo);
				}
				else {
					return $this->goHome ();
				/* 	return Yii::$app->getResponse ()->redirect ( [
    				'site/matchingjobs',
    	
    				'userid' =>Yii::$app->emplyoee->emplyoeeid
    				] ); */
				}
				
			}
			else {
				
				return $this->goBack ();
			}
            
        } else {
        	
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
       ///Yii::$app->user->logout();
    	\Yii::$app->session->remove('user.emplyoeeid');
    	\Yii::$app->session->remove('user.emplyoeeusername');
    	\Yii::$app->session->remove('user.emplyoeepassword_hash');
    	\Yii::$app->session->remove('user.emplyoeepassword_reset_token');
    	\Yii::$app->session->remove('user.emplyoeeemail');
    	\Yii::$app->session->remove('user.emplyoeeauth_key');    	
    	\Yii::$app->session->remove('user.emplyoeestatus');
    	\Yii::$app->session->remove('user.emplyoeecreated_at');
    	\Yii::$app->session->remove('user.emplyoeeupdated_at');    	
    	\Yii::$app->session->remove('user.emplyoeeroleid');
    	

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
    	
    	$this->layout= '@app/views/layouts/innerpagemain';
    	
        $model = new SignupForm();
        $employee_signup = new EmployeeSignup();
       //$employeesignup = new EmployeeSignup();
        if ($model->load(Yii::$app->request->post())&& $model->validate()) {
        	$checkMobile = EmployeeSignup::find()->where(['mobilenumber' => $model->mobilenumber])->count();
        	if($checkMobile != 0)
        	{
        		$model->addError('mobilenumber','This mobile number has already been taken.');
        		return $this->render('signup', [
        				'model' => $model,
        		]);
        		exit();
        	}
        	//print_r(Yii::$app->request->post());exit();
        	
        	
        	

        	if ($user = $model->signup()) {
        		 
        		
        		
        		
        		$name = $model->name;
        		//print_r($name);exit();
        		$surname = $model->surname;
        		$gender = $model->gender;
        		$dateofbirth = date('Y-m-d', strtotime($model->dateofbirth));
        		$mobilenumber=$model->mobilenumber;
        		$createdDate = date("Y-m-d H:i:s");
        		
        		
        		
        	
        		
        		
        		$id = Yii::$app->db->getLastInsertID();
        		//print_r($id);exit();
        		$employee_signup->name= $name;
        		$employee_signup->surname= $surname;
        		$employee_signup->gender= $gender;
        		$employee_signup->dateofbirth= $dateofbirth;
        		$employee_signup->mobilenumber= $mobilenumber;
        		$employee_signup->createdDate = $createdDate;
        		$employee_signup->userid= $id;
        		$employee_signup->country= '';
        		$employee_signup->state= '';
        		$employee_signup->city= '';
        		$employee_signup->profileimage= '';
        		$employee_signup->description= '';
        		$employee_signup->save();
        		//print_r($employee_signup->errors);exit();
        		
        		/* Yii::$app->db->createCommand()->insert('employee_signup', [
        				'name' => $name,'surname' => $surname, 'gender' => $gender, 'dateofbirth' => $dateofbirth,
        				'mobilenumber' => $mobilenumber,'userid'=>$id])->execute(); */
        		
        		Yii::$app->getSession()->setFlash('success', [
        				'type' => 'success',
        				'duration' => 20000,
        				'icon' => 'fa fa-users',
        				'message' => 'You Are SuccessFully Registered.',
        				'title' => 'Success',
        				'positonY' => 'top',
        				'positonX' => 'center'
        		]);
        		
        		 
        		return $this->goHome();
        		 
        		if (Yii::$app->getUser()->login($user)) {
        	
        			return $this->goHome();
        		}
        	}
        
        	
        	
       
        }
        else {
        	return $this->render('signup', [
        			'model' => $model,
        	]);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionViewprofile()
    {
    	
    	
    	$this->layout= '@app/views/layouts/innerpagemain';
    
    	$umodel = User::find ()->Where (['id' => Yii::$app->emplyoee->emplyoeeid])->one();
    
    	$empmodel = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
    	
    	$edumodel = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
    	//print_r($edumodel);
    	//exit();
    	
    		
    	$jobmodel = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
    		
    	$skillmodel = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->all();
    	//$skillmodel = EmployeeSkills::find()->select(['skillname', 'userid' => Yii::$app->emplyoee->emplyoeeid])->distinct();
    	//print_r($skillmodel->skillname);exit();
    	/* $skillname=  count($skillmodel->skillname);
    	print_r($skillname);exit(); */
    	$projectmodel =   EmployeeProjects :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
    	$employermodel =   EmployeeEmployer :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
    	
    	$languagemodel =   EmployeeLanguages :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->all();
    
    	return $this->render('/site/viewprofile', ['empmodel' => $empmodel,'umodel' => $umodel,'edumodel' => $edumodel, 'jobmodel' => $jobmodel, 'skillmodel' => $skillmodel,
    			'projectmodel' => $projectmodel, 'employermodel' => $employermodel, 'languagemodel' => $languagemodel]);
    }
    
    
    
    

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
    	$this->layout= '@app/views/layouts/innerpagemain';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
    	$this->layout= '@app/views/layouts/innerpagemain';
    	
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
   
    
    
    
	
	public function actionApplylist($id)
	{
	
		$model = new EmployeeJobapplied();
		
		$searchModel = new EmployeeJobsearch();
	
		$query = EmployeeJobapplied::find()->where(['id' => Yii::$app->emplyoee->emplyoeeid])->one();
		$userId = $query['id'];
		$JobId = $id;
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model = $model->insertQuery($userId, $JobId,$appliedDate);
		return $this->render('applylist', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
		]);
	
	
	}
	

	public function actionMyjobs()
	{
	
	
		$this->layout= '@app/views/layouts/innerpagemain';
		$applied_data = EmployeeJobapplied::find()->joinWith('job')->where(['employee_job_applied.userid' => Yii::$app->emplyoee->emplyoeeid]);
		//print_r($applied_data);exit();
		
		
		
		//$total_list=count($applied_data);
		
		$dataProvider = new ActiveDataProvider([
				'pagination' => ['pageSize' =>5],
				'query' => $applied_data,
		]);
	  // $model->applieddata = $applied_data;
	
	

	
	   return $this->render('myjobs',['dataProvider' => $dataProvider, ]
	   	);
	   
	
	}
	
	public function actionJobdetails($id)
	{
	
		$this->layout = '@app/views/layouts/innerpagemain';
		$jobinfo = $this->findModel( $id );
		return $this->render ( 'jobdetails', [
				'jobinfo' => $jobinfo
		]);
	}
	

	protected function findModel($id) {
		if (($model = EmployerJobpostings::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	
	
	
	
	public function actionApplyjobajax()
	{
			if ((Yii::$app->user->isGuest) || (Yii::$app->emplyoee->emplyoeeroleid !=3))
			{
				Yii::$app->getSession()->setFlash('danger', [
						'type' => 'danger',
						'duration' => 20000,
						'icon' => 'fa fa-users',
						'message' => 'Please Login to Apply this Job.',
						'title' => 'Errors',
						'positonY' => 'bottom',
						'positonX' => 'right'
				]);
		
				$this->redirect(['employees-login']);
			}
			else {
				
				$result = array();
				$query = User::find()->where(['id' => Yii::$app->emplyoee->emplyoeeid])->one();
				$userId = Yii::$app->emplyoee->emplyoeeid;
				$JobId = $_GET['jbid'];
				
				$model = new EmployeeJobapplied();
				$checkJobs = $model->checkQuery($userId, $JobId);
				$model->jobid = $checkJobs;
				$UserSelectJob =  $model->jobid;			
				
				if($checkJobs = 1)
				{
					$model = $model->insertQuery($userId, $JobId);
					$result['status'] = 1;
					$result['message'] = 'success';
				}else{
				
					$result['status'] = 0;
					$result['message'] = 'Already Applied';
				}
				return json_encode($result);
				/* Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 3000,
						'icon' => 'fa fa-users',
						'message' => 'Successfully Applied.',
						'title' => 'Success',
						'positonY' => 'bottom',
						'positonX' => 'right',
				
				]);
		
				return $this->render('index'); */
			}	
		
	}
	
	
}
