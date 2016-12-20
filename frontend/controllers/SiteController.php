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
use frontend\models\JobpostSearch;
use frontend\models\EmployeeJobapplied;

use common\models\User;
use yii\web\UploadedFile;
use frontend\models\EmployeeJobappied;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
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
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	
    	$model = new EmployeeJobapplied();
    	$searchModel = new JobpostSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	
    	
    	return $this->render('index', [
    			'dataProvider' => $dataProvider,
    			'searchModel' => $searchModel
    	]);
    	}
    	

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
    	
    	$this->layout= '@app/views/layouts/innerpagemain';
    	if ((! \Yii::$app->user->isGuest) && (Yii::$app->emplyoee->emplyoeeroleid ==3)) {
    		//return $this->goHome ();
    		return Yii::$app->getResponse ()->redirect ( [
    				'site/viewprofile',
    	
    				'userid' =>Yii::$app->emplyoee->emplyoeeid
    				] );
    	}
    	
        

        $model = new LoginForm();
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
       // Yii::$app->user->logout();
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
       //$employeesignup = new EmployeeSignup();
        if ($model->load(Yii::$app->request->post())) {
        	
        	//print_r(Yii::$app->request->post());exit();
        	
        	
        	

        	if ($user = $model->signup()) {
        		 
        		
        		
        		
        		$name = $model->name;
        		//print_r($name);exit();
        		$surname = $model->surname;
        		$gender = $model->gender;
        		$dateofbirth = date('Y-m-d', strtotime($model->dateofbirth));
        		$mobilenumber=$model->mobilenumber;
        		$model->profileimage = UploadedFile::getInstance($model,'profileimage');
        		//print_r($model->profileimage);exit();
        		$imageName = time().$model->profileimage;
        		$profileimage = '/frontend/web/profileimages/'.$imageName;
        		 
        		 
        		//print_r($imageName);exit();
        		
        		if(!(empty($model->profileimage)))
        		{
        			$imageName = time().$model->profileimage->name;
        			//print_r($imageName);exit();
        			$model->profileimage->saveAs('profileimages/'.$imageName );
        			$model->profileimage = 'profileimages/'.$imageName;
        		}
        		
        		 
        		/* $userid = Yii::$app->user->id ;
        		 $model->userid=$userid;
        		 $userids=$model->userid;
        		 
        		 
        		 */
        		
        		
        		$id = Yii::$app->db->getLastInsertID();
        		//print_r($id);exit();
        		
        		Yii::$app->db->createCommand()->insert('employee_signup', [
        				'name' => $name,'surname' => $surname, 'gender' => $gender, 'dateofbirth' => $dateofbirth,
        				'mobilenumber' => $mobilenumber,'profileimage' => $profileimage,'userid'=>$id])->execute();
        	
        		return $this->goHome();
        		 
        		if (Yii::$app->getUser()->login($user)) {
        	
        			return $this->goHome();
        		}
        	}
        
        	
        	
       
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
    protected function findModel($id) {
    	if (($model = EmployerJobpostings::findOne ( $id )) !== null) {
    		return $model;
    	} else {
    		throw new NotFoundHttpException ( 'The requested page does not exist.' );
    	}
	}
	public function actionApply($id)
	{
		$query = User::find()->where(['id' => Yii::$app->emplyoee->emplyoeeid])->one();
		$userId = $query['id'];
		$JobId = $id;
	
		$model = new EmployeeJobapplied();
		$checkJobs = $model->checkQuery($userId, $JobId);
		$model->jobid = $checkJobs;
		$UserSelectJob =  $model->jobid;
	
	
		if($UserSelectJob)
		{
			Yii::$app->getSession()->setFlash('error', 'Already Applied ');
			//echo "Already select join";
			return $this->render('index', [
					'model' => $this->findModel($id),
			]);
		}else{
	
			$model = $model->insertQuery($userId, $JobId);
			return $this->redirect(['index']);
	
		}
	
	}
	public function actionApplylist($id)
	{
	
		$model = new EmployeeJobapplied();
		
		$searchModel = new JobpostSearch();
	
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
	public function actionApplyjobajax()
	{
		$result = array();
		$query = User::find()->where(['id' => Yii::$app->user->id])->one();
		$userId = Yii::$app->user->id;
		$JobId = $_GET['jbid'];
	
		$model = new EmployeeJobapplied();
		$checkJobs = $model->checkQuery($userId, $JobId);
		$model->jobid = $checkJobs;
		$UserSelectJob =  $model->jobid;
	
	
		if($checkJobs = 1)
		{
			$model = $model->insertQuery($userId, $JobId);
			$result['status'] = 1;
			//$result['message'] = 'success';
		}else{
	
			$result['status'] = 0;
			$result['message'] = 'Already Applied';
		}
		Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 3000,
					'icon' => 'fa fa-users',
					'message' => 'Successfully Applied.',
					'title' => 'Success',
					'positonY' => 'bottom',
					'positonX' => 'right',
						
			]);
		return $this->redirect(['index']);
	
	}
}
