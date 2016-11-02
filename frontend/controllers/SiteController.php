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
use frontend\models\EmployeeEducation;
use common\models\User;
use yii\web\UploadedFile;
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
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
       //$employeesignup = new EmployeeSignup();
        if ($model->load(Yii::$app->request->post())) {
        	
        	//print_r(Yii::$app->request->post());exit();
        
        	$name = $model->name;
        	$surname = $model->surname;
        	$gender = $model->gender;
        	$dateofbirth = date('Y-m-d', strtotime($model->dateofbirth));
        	$mobilenumber=$model->mobilenumber;
        	$model->profileimage = UploadedFile::getInstance($model,'profileimage');
        	$profileimage=$model->profileimage;                                                                                                   
        	
        	
        	

        	if(!(empty($model->profileimage)))
        	{
        		$imageName = time().$model->profileimage->name;
        		//print_r($imageName);exit();
        		$model->profileimage->saveAs('profileimages/'.$imageName );
        		$model->profileimage = 'profileimages/'.$imageName;
        	}
        	 
        	
        	/* $userid = Yii::$app->user->id ;
        	$model->userid=$userid;
        	$userids=$model->userid; */
        	
        	Yii::$app->db->createCommand()->insert('employee_signup', [
        			'name' => $name,'surname' => $surname, 'gender' => $gender, 'dateofbirth' => $dateofbirth,
        			'mobilenumber' => $mobilenumber,'profileimage' => $profileimage])->execute();
        	
        	
            if ($user = $model->signup()) {
            	
            
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
    
    	$umodel = User::find ()->Where (['id' => Yii::$app->user->id])->one();
    
    	$empmodel = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    	
    	$edumodel = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    	//print_r($edumodel);
    	//exit();
    	
    		
    	$jobmodel = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    		
    	$skillmodel = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
    		 
    
    	return $this->render('/site/viewprofile', ['empmodel' => $empmodel,'umodel' => $umodel,'edumodel' => $edumodel, 'jobmodel' => $jobmodel, 'skillmodel' => $skillmodel]);
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
}
