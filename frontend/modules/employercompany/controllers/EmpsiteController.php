<?php
namespace app\modules\employercompany\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\EmployerSignup;
use frontend\models\Employer;
use frontend\models\ContactForm;
use frontend\models\EmployerCompany;
use common\models\User;
use frontend\models\EmployerEducation;
use frontend\models\EmployerPreferences;

/**
 * Site controller
 */
class EmpsiteController extends Controller
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
                        'roles' => ['?'],
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
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
    	/* if (!\Yii::$app->user->isGuest) {
    		return $this->goHome();
    	} */
    
    	$model = new LoginForm();
    	if ($model->load(Yii::$app->request->post()) && $model->login()) {
    		
    		//return $this->goBack();
    		//return $this->redirect ( '/employercompany/empcommon/employer');
    		return Yii::$app->getResponse()->redirect(['employercompany/empcommon/employer', 'userid' => Yii::$app->user->id ] );
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
    
    	
        Yii::$app->user->logout();

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

   
    public function actionSignup()
    {
//     	if(Yii::$app->user->id = '')
//     	{
//     		return $this->goHome();
    		
//      	}
    	$model = new EmployerSignup();
    	//$employeesignup = new EmployeeSignup();
    	if ($model->load(Yii::$app->request->post())) {
    		 
    		//print_r(Yii::$app->request->post());exit();
    
    		$name=$model->name;
        	$mobilenumber=$model->mobilenumber;
        	$dateofbirth=$model->dateofbirth;
        	$gender=$model->gender;
        	$designation=$model->designation;
        	$address=$model->address;
        //	$userid=$model->userid = Yii::$app->user->id ;
        	
        	
        	
        	Yii::$app->db->createCommand()->insert('employer', [
        			'name' => $name,'mobilenumber' => $mobilenumber, 'gender' => $gender,'designation' => $designation, 'dateofbirth' => $dateofbirth,
        		'address' => $address])->execute();
    		 
    		if ($user = $model->signup()) {
    			//return $this->goHome();
    			//return $this->redirect ('login');
    			return Yii::$app->getResponse()->redirect(['employercompany/empsite/login', 'userid' => Yii::$app->user->id ] );
    			if (Yii::$app->getUser()->login($user)) {
    				return $this->goHome();
    			}
    		}
    	}
    
    	return $this->render('signup', [
    			'model' => $model,
    	]);
    }
    /**
     * Requests password reset.
     *
     * @return mixed
     */
  
    public function actionViewprofile()
    {
       //*******profile*****//
    	//$model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
    	//$model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
    	
    	$userData = User::find ()->where (['id' => Yii::$app->user->id] )->one ();
    	//print_r($userData);exit;
//     	$employeData = Employer::find ()->where ( [
//     			'id' => Yii::$app->user->id
//     	] )->one ();
    	//print_r($employeData);exit;
    	$model->username = $userData ['username'];
    	
    	$model->email = $userData ['email'];
    	$model->name = $employeData ['name'];
//     	print_r($model->name);exit;
//     	$model->designation = $employeData ['designation'];
//     	$model->gender = $employeData ['gender'];
//     	$model->dateofbirth = $employeData ['dateofbirth'];
//     	$model->mobilenumber = $employeData ['mobilenumber'];
//     	$model->address = $employeData ['address'];
    	
    
    	$employeData = Employer :: find ()->Where (['id' => Yii::$app->user->id])->one();
    	 
    	//$edumodel = EmployerEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    	//print_r($edumodel);
    	//exit();
    	 
    
    ////	$jobmodel = EmployerCompany :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    	
    //	$jobmodel = EmployerPreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    	
    	//$skillmodel = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    
    
    	return $this->render('/site/viewprofile', [ //'empmodel' => $empmodel,
    			//upmodel' => $umodel,
    			'model' => $model,
    			////'edumodel' => $edumodel,
    			'employeData' => $employeData
    			]);
    }
    
    public function actionMounika(){
    	
    		$model = new EmployerSignup ();
    	
    		$userData = User::find ()->where ( [
    				'id' => Yii::$app->user->id
    		] )->one ();
    		print_r(Yii::$app->user->id );
    		$employeData = Employer::find ()->where ( [
    				'id' => Yii::$app->user->id
    		] )->one ();
    		
    		//print_r($employeData);exit;
    		$model->username = $userData ['username'];
    		$model->email = $userData ['email'];
    		//print_r($model->email);exit;
    		$model->name = $employeData ['name'];
    		//print_r($model->name);exit;
    		$model->designation = $employeData ['designation'];
    		$model->gender = $employeData ['gender'];
    		$model->dateofbirth = $employeData ['dateofbirth'];
    		$model->mobilenumber = $employeData ['mobilenumber'];
    		$model->address = $employeData ['address'];
    		//print_r($model->error);exit;
    		
    		$jobmodel = EmployerCompany :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    		$edumodel = EmployerEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    		$empmodel = EmployerPreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    		return $this->render('/site/viewprofile', ['model' => $model,'jobmodel' =>$jobmodel,'edumodel' => $edumodel,'empmodel' => $empmodel]);
    		    	}
             public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                         return $this->goHome();
               // prin_r($model->errors);exit();
            } else {
                Yii::$app->session->setFlash('error','Sorry, we are unable to reset password for email provided.');
            }
                   }
           return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
      /**
     * Resets password.
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
    public function actionEmpsite()
    {
    	$model = new EmployerSignup();
    	$this->empsite = 'viewprofile';
    
    	return $this->render('signup', [
    			'model' =>$model,
    	]);
    }
}
