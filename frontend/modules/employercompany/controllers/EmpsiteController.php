<?php

namespace app\modules\employercompany\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\ChangePasswordForm;
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
use frontend\models\EmployerRolesModel;

/**
 * Site controller
 */
class EmpsiteController extends Controller {
	/**
	 * @inheritdoc
	 */
	
	
	public function behaviors()
	{
	
		$permissionsArray = [''];
			if(EmployerRolesModel::getRole() == 2)
		{
			$permissionsArray = ['index','login','logout','contact','about','signup',
					'viewprofile'
			];
		}
		else {
			$permissionsArray = ['index','login','logout','contact','about','signup'];
		}
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
								'index','login','logout','contact','about','signup','viewprofile'
	
						],
						'rules' => [
								[
										'actions' => $permissionsArray,
										'allow' => true,
										'matchCallback' => function ($rule, $action) {
											
										if((EmployerRolesModel::getRole() == 2) || (EmployerRolesModel::getRole() == 0))
										{
												
											return true;
										}
										}
										],
										[
												'denyCallback' => function ($rule, $action) {
													
												$this->redirect(Yii::$app->urlManager->createUrl(['employers']));
												}
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
	
		$this->layout = '@app/views/layouts/employermain';
		if ((! \Yii::$app->user->isGuest) && (Yii::$app->employer->employerroleid == 2)) {
		
			Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 20000,
					'icon' => 'fa fa-users',
					'message' => 'successfully  login.',
					'title' => 'Success',
					'positonY' => 'top',
					'positonX' => 'center'
			]);
			return Yii::$app->getResponse ()->redirect ( [
					'employers-profile'
			] );
		}
		$model = new LoginForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->login ()) {
			if($model->user->roleid == 2)
			{
				\Yii::$app->session->set('user.employerid',Yii::$app->user->identity->id);
				\Yii::$app->session->set('user.employerusername',Yii::$app->user->identity->username);
				\Yii::$app->session->set('user.employerpassword_hash',Yii::$app->user->identity->password_hash);
				\Yii::$app->session->set('user.employerpassword_reset_token',Yii::$app->user->identity->password_reset_token);
				\Yii::$app->session->set('user.employeremail',Yii::$app->user->identity->email);
				\Yii::$app->session->set('user.employerauth_key',Yii::$app->user->identity->auth_key);				
				\Yii::$app->session->set('user.employerstatus',Yii::$app->user->identity->status);
				\Yii::$app->session->set('user.employercreated_at',Yii::$app->user->identity->created_at);
				\Yii::$app->session->set('user.employerupdated_at',Yii::$app->user->identity->updated_at);				
				\Yii::$app->session->set('user.employerroleid',Yii::$app->user->identity->roleid);
				
				return Yii::$app->getResponse()->redirect(Yii::$app->urlManager->createUrl(['employers-profile']));
			}
			if($model->user->roleid == 3)
			{
				$model->addError('username','You dont have employer credentials');
			
				return $this->render('login', [
						'model' => $model,
				]);
			
			}
			
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
		$model = new LoginForm ();
	
		\Yii::$app->session->remove('user.employerid');
		\Yii::$app->session->remove('user.employerusername');
		\Yii::$app->session->remove('user.employerpassword_hash');
		\Yii::$app->session->remove('user.employerpassword_reset_token');
		\Yii::$app->session->remove('user.employeremail');
		\Yii::$app->session->remove('user.employerauth_key');
		\Yii::$app->session->remove('user.employerstatus');
		\Yii::$app->session->remove('user.employercreated_at');
		\Yii::$app->session->remove('user.employerupdated_at');
		\Yii::$app->session->remove('user.employerroleid');
		
		return $this->redirect ( 'employers' );
		
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
			Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 20000,
						'icon' => 'fa fa-users',
						'message' => 'Thank you for contacting us. We will respond to you as soon as possible.',
						'title' => 'Success',
						'positonY' => 'top',
						'positonX' => 'center'
				]);
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
		$employermodel = new Employer();
		$model->scenario = 'signup';
		
		$this->layout = '@app/views/layouts/employermain';
		if ($model->load ( Yii::$app->request->post () )) {
			
			
			
			if ($user = $model->signup ()) {
			
				$this->layout = '@app/views/layouts/employermain';
				
				$firstname = $model->first_name;
				$lastname = $model->last_name;
				$mobilenumber = $model->mobilenumber;
				$dateofbirth = date ( 'Y-m-d', strtotime ( $model->dateofbirth ) );
				$gender = $model->gender;
				
				
			    $model->create_date = date ( "Y-m-d H:i:s" );
			    $model ->save();
				$userid = Yii::$app->db->getLastInsertID ();
				$employermodel->first_name = $firstname;
				$employermodel->last_name = $lastname;
				$employermodel->mobilenumber = $mobilenumber;
				$employermodel->gender = $gender;
				$employermodel->dateofbirth = $dateofbirth;
				$employermodel->userid = $userid;
				$employermodel->create_date = $model->create_date;
				$employermodel->designation = '';
				$employermodel->address = '';
				$employermodel->profileimage = '';
			//	$employermodel->create_date = $date;
				$employermodel->skills = '';
				$employermodel->save();
				//print_r($employermodel->errors);exit();
				/* Yii::$app->db->createCommand ()->insert ( 'employer', [ 
						'name' => $name,
						'mobilenumber' => $mobilenumber,
						'gender' => $gender,
						
						'dateofbirth' => $dateofbirth,
						
						
						'userid' => $userid ,
						'create_date'=>$date
				] )->execute (); */
			
				Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 20000,
						'icon' => 'fa fa-users',
						'message' => 'successfully   Registered.',
						'title' => 'Success',
						'positonY' => 'top',
						'positonX' => 'center'
				]);
				return Yii::$app->getResponse ()->redirect ( [ 
						'employers'
				] );
				if (Yii::$app->getUser ()->login ( $user )) {
					
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
	
		$userData = User::find ()->where ( [ 
				'id' => Yii::$app->employer->employerid 
		] )->one ();
		$model->username = $userData ['username'];
		
		$model->email = $userData ['email'];
		$model->name = $employeData ['name'];
		
		
		$employeData = Employer::find ()->Where ( [ 
				'id' => Yii::$app->employer->employerid 
		] )->one ();
		
		return $this->render ( '/site/viewprofile', [  
				'model' => $model,
				
				'employeData' => $employeData 
		] );
	}
	
	public function actionRequestPasswordReset() {
		$this->layout = '@app/views/layouts/employermain';
		$model = new PasswordResetRequestForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->validate ()) {
			if ($model->sendEmail ()) {
				
				Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 20000,
						'icon' => 'fa fa-users',
						'message' => 'Check your email for further instructions.',
						'title' => 'Success',
						'positonY' => 'top',
						'positonX' => 'center'
				]);
			
				return Yii::$app->getResponse ()->redirect ( [
						'request-password-reset',
						'success' => 1
						
				] );
				
			
				
			} else {
				Yii::$app->getSession()->setFlash('danger', [
						'type' => 'danger',
						'duration' => 12000,
						'icon' => 'fa fa-users',
						'message' => 'Sorry, we are unable to reset password for email provided.',
						'title' => 'Errors',
						'positonY' => 'top',
						'positonX' => 'center'
				]);
			
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
			
			Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 20000,
					'icon' => 'fa fa-users',
					'message' => 'New password was saved.',
					'title' => 'Success',
					'positonY' => 'top',
					'positonX' => 'center'
			]);
			
			
			return Yii::$app->getResponse ()->redirect ( [
					'employers',
					
			] );
		}
		
		return $this->render ( 'resetPassword', [ 
				'model' => $model 
		] );
	}
public function actionChangepassword()
		{
	       $this->layout = '@app/views/layouts/employermain';
	          	      
	          	      $modeluser = User::find ()->where ( [ 
				 'id' => Yii::$app->employer->employerid 
		              ] )->one ();
	          	      
	          	      $model = new ChangePasswordForm();
	          	      if($model->load(Yii::$app->request->post())){
	          	      	//validate
	          	      	if($model->validate()){
		          	      		try{
		          	      			$modeluser->password = $_POST['ChangePasswordForm']['password'];
		          	      			
		          	      			$modeluser->password_hash = $model->resetPassword($modeluser->password);
		          	      			
		          	      			if($modeluser->save()){
		          	      			  /*  Yii::$app->getSession()->setFlash(
		          	      				 'success','Password changed'
		          	      				);  */
		          	      				Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 12000,
						'icon' => 'fa fa-check',
						'message' => 'Your password is successfully changed.',
						'title' => 'Success',
						'positonY' => 'top',
						'positonX' => 'center'
				]);
		          	      				return $this->redirect(['login']);
		          	      				
		          	      				/*return $this->render('changePassword',[
		          	      				 'model'=>$model
		          	      				  ]);  */
		          	      				//return $this->redirect(['index']);
		          	      			}else{
		          	      				Yii::$app->getSession()->setFlash('danger', [
    					'type' => 'danger',
    					'duration' => 12000,
    					'icon' => 'fa fa-users',
    					'message' => 'Password not changed.',
    					'title' => 'Errors',
    					'positonY' => 'top',
    					'positonX' => 'center'
    			]);
		          	      				
		          	      				
		          	      			}
		          	      		}catch(Exception $e){
		          	      			Yii::$app->getSession()->setFlash('danger', [
		          	      					'type' => 'danger',
		          	      					'duration' => 12000,
		          	      					'icon' => 'fa fa-users',
		          	      					'message' => $e->getMessage(),
		          	      					'title' => 'Errors',
		          	      					'positonY' => 'top',
		          	      					'positonX' => 'center'
		          	      			]);
		          	      			
		          	      			return $this->render('change_password',[
		          	      					'model'=>$model
		          	      			]);
		          	      		}
		          	      		 
	          	      	}else{
	          	      		return $this->render('change_password',['model'=>$model]);
	          	      	}
	          	      	
	          	     }else{
			    		return $this->render('change_password',['model'=>$model]);
			    }
			     
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
