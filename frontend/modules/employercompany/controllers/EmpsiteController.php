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
use yii\web\UploadedFile;

/**
 * Site controller
 */
class EmpsiteController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						'only' => [ 
								'logout',
								'signup' 
						],
						'rules' => [ 
								[ 
										'actions' => [ 
												'signup' 
										],
										'allow' => true,
										'roles' => [ 
												'?' 
										] 
								],
								[ 
										'actions' => [ 
												'logout' 
										],
										'allow' => true,
										'roles' => [ 
												'@' 
										] 
								] 
						] 
				],
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => [ 
								'logout' => [ 
										'post' 
								] 
						] 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],
				'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null 
				] 
		];
	}
	
	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		$this->layout = '@app/views/layouts/employermain';
		
		return $this->render ( 'index' );
	}
	
	/**
	 * Logs in a user.
	 *
	 * @return mixed
	 */
	public function actionLogin() {
		/*
		 * if (!\Yii::$app->user->isGuest) {
		 * return $this->goHome();
		 * }
		 */
		$this->layout = '@app/views/layouts/employermain';
		$model = new LoginForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->login ()) {
			
			// return $this->goBack();
			// $this->layout = "employermain";
			// return $this->redirect ( '/employercompany/empcommon/employer');
			
			return Yii::$app->getResponse ()->redirect ( [ 
					'employercompany/empcommon/employercommonview',
					'userid' => Yii::$app->user->id 
			] );
		} else {
			return $this->render ( 'login', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout() {
		$this->layout = '@app/views/layouts/employermain';
		
		Yii::$app->user->logout ();
		
		return $this->goHome ();
	}
	
	/**
	 * Displays contact page.
	 *
	 * @return mixed
	 */
	public function actionContact() {
		$this->layout = '@app/views/layouts/employermain';
		$model = new ContactForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->validate ()) {
			if ($model->sendEmail ( Yii::$app->params ['adminEmail'] )) {
				Yii::$app->session->setFlash ( 'success', 'Thank you for contacting us. We will respond to you as soon as possible.' );
			} else {
				Yii::$app->session->setFlash ( 'error', 'There was an error sending email.' );
			}
			
			return $this->refresh ();
		} else {
			return $this->render ( 'contact', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Displays about page.
	 *
	 * @return mixed
	 */
	public function actionAbout() {
		$this->layout = '@app/views/layouts/employermain';
		return $this->render ( 'about' );
	}
	public function actionSignup() {
		
		$model = new EmployerSignup ();
		$model->scenario = 'signup';
		// $employeesignup = new EmployeeSignup();
		$this->layout = '@app/views/layouts/employermain';
		if ($model->load ( Yii::$app->request->post () )) {
			
			// print_r(Yii::$app->request->post());exit();
			
			if ($user = $model->signup ()) {
				// return $this->goHome();
				// return $this->redirect ('login');
				// $this->layout = "employermain";
				$this->layout = '@app/views/layouts/employermain';
				
				$name = $model->name;
				$mobilenumber = $model->mobilenumber;
				$dateofbirth = date ( 'Y-m-d', strtotime ( $model->dateofbirth ) );
				//$dateofbirth = $model->dateofbirth;
				$gender = $model->gender;
				$designation = $model->designation;
				$address = $model->address;
				
				$model->profileimage = UploadedFile::getInstance ( $model, 'profileimage' );
				// print_r($model->profileimage);exit();
				$imageName = time () . $model->profileimage->name;
				$profileimage = '/frontend/web/profileimages/' . $imageName;
				
				// print_r($imageName);exit();
				
				if (! (empty ( $model->profileimage ))) {
					$imageName = time () . $model->profileimage->name;
					// print_r($imageName);exit();
					$model->profileimage->saveAs ( 'profileimages/' . $imageName );
					$model->profileimage = 'profileimages/' . $imageName;
				}
				$date=$model->create_date = date ( "Y-m-d H:i:s" );
				$userid = Yii::$app->db->getLastInsertID ();
				
				Yii::$app->db->createCommand ()->insert ( 'employer', [ 
						'name' => $name,
						'mobilenumber' => $mobilenumber,
						'gender' => $gender,
						'designation' => $designation,
						'dateofbirth' => $dateofbirth,
						'address' => $address,
						'profileimage' => $profileimage,
						'userid' => $userid ,
						'create_date'=>$date
				] )->execute ();
				
				return Yii::$app->getResponse ()->redirect ( [ 
						'employercompany/empsite/login',
						'userid' => Yii::$app->user->id 
				] );
				if (Yii::$app->getUser ()->login ( $user )) {
					// return $this->goHome();
				}
			}
		}
		
			
		
		return $this->render ( 'signup', [ 
				'model' => $model 
		] );
		
	}
	/**
	 * Requests password reset.
	 *
	 * @return mixed
	 */
	public function actionViewprofile() {
		$this->layout = '@app/views/layouts/employermain';
		// *******profile*****//
		// $model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		// $model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		
		$userData = User::find ()->where ( [ 
				'id' => Yii::$app->user->id 
		] )->one ();
		// print_r($userData);exit;
		// $employeData = Employer::find ()->where ( [
		// 'id' => Yii::$app->user->id
		// ] )->one ();
		// print_r($employeData);exit;
		$model->username = $userData ['username'];
		
		$model->email = $userData ['email'];
		$model->name = $employeData ['name'];
		// print_r($model->name);exit;
		// $model->designation = $employeData ['designation'];
		// $model->gender = $employeData ['gender'];
		// $model->dateofbirth = $employeData ['dateofbirth'];
		// $model->mobilenumber = $employeData ['mobilenumber'];
		// $model->address = $employeData ['address'];
		
		$employeData = Employer::find ()->Where ( [ 
				'id' => Yii::$app->user->id 
		] )->one ();
		
		// $edumodel = EmployerEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		// print_r($edumodel);
		// exit();
		
		// // $jobmodel = EmployerCompany :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		// $jobmodel = EmployerPreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		// $skillmodel = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		return $this->render ( '/site/viewprofile', [  // 'empmodel' => $empmodel,
		                                            // upmodel' => $umodel,
				'model' => $model,
				// //'edumodel' => $edumodel,
				'employeData' => $employeData 
		] );
	}
	public function actionMounika() {
		$this->layout = '@app/views/layouts/employermain';
		$model = new EmployerSignup ();
		
		$userData = User::find ()->where ( [ 
				'id' => Yii::$app->user->id 
		] )->one ();
		print_r ( Yii::$app->user->id );
		$employeData = Employer::find ()->where ( [ 
				'id' => Yii::$app->user->id 
		] )->one ();
		
		// print_r($employeData);exit;
		$model->username = $userData ['username'];
		$model->email = $userData ['email'];
		// print_r($model->email);exit;
		$model->name = $employeData ['name'];
		// print_r($model->name);exit;
		$model->designation = $employeData ['designation'];
		$model->gender = $employeData ['gender'];
		$model->dateofbirth = $employeData ['dateofbirth'];
		$model->mobilenumber = $employeData ['mobilenumber'];
		$model->address = $employeData ['address'];
		// print_r($model->error);exit;
		
		$jobmodel = EmployerCompany::find ()->Where ( [ 
				'userid' => Yii::$app->user->id 
		] )->one ();
		$edumodel = EmployerEducation::find ()->Where ( [ 
				'userid' => Yii::$app->user->id 
		] )->one ();
		$empmodel = EmployerPreferences::find ()->Where ( [ 
				'userid' => Yii::$app->user->id 
		] )->one ();
		return $this->render ( '/site/viewprofile', [ 
				'model' => $model,
				'jobmodel' => $jobmodel,
				'edumodel' => $edumodel,
				'empmodel' => $empmodel 
		] );
	}
	public function actionRequestPasswordReset() {
		$this->layout = '@app/views/layouts/employermain';
		$model = new PasswordResetRequestForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->validate ()) {
			if ($model->sendEmail ()) {
				Yii::$app->session->setFlash ( 'success', 'Check your email for further instructions.' );
				return $this->goHome ();
				// prin_r($model->errors);exit();
			} else {
				Yii::$app->session->setFlash ( 'error', 'Sorry, we are unable to reset password for email provided.' );
			}
		}
		return $this->render ( 'requestPasswordResetToken', [ 
				'model' => $model 
		] );
	}
	/**
	 * Resets password.
	 * 
	 * @param string $token        	
	 * @return mixed
	 * @throws BadRequestHttpException
	 */
	public function actionResetPassword($token) {
		$this->layout = '@app/views/layouts/employermain';
		try {
			$model = new ResetPasswordForm ( $token );
		} catch ( InvalidParamException $e ) {
			throw new BadRequestHttpException ( $e->getMessage () );
		}
		
		if ($model->load ( Yii::$app->request->post () ) && $model->validate () && $model->resetPassword ()) {
			Yii::$app->session->setFlash ( 'success', 'New password was saved.' );
			
			return $this->goHome ();
		}
		
		return $this->render ( 'resetPassword', [ 
				'model' => $model 
		] );
	}
	public function actionEmpsite() {
		$this->layout = '@app/views/layouts/employermain';
		$model = new EmployerSignup ();
		$this->empsite = 'viewprofile';
		
		return $this->render ( 'signup', [ 
				'model' => $model 
		] );
	}
}
