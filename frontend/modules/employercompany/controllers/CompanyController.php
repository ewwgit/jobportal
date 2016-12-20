<?php
namespace app\modules\employercompany\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\base\ErrorException;
use frontend\models\Preferences;
use yii\web\UploadedFile;
use frontend\models\EmployerPreferences;
use frontend\models\EmployerEducation;
use frontend\models\Employer;
use frontend\models\EmployerSkills;
use frontend\models\EmployerSignup;
use frontend\models\Employement;
use common\models\User;
use frontend\models\EmployerCompany;

class CompanyController extends Controller
{
	public function actionProfile()
	{
		$model = new EmployerSignup ();
	
		$userData = User::find ()->where ( [ 
				'id' => Yii::$app->employer->employerid 
		] )->one ();
		print_r(Yii::$app->employer->employerid );
		$employeData = Employer::find ()->where ( [
				'employerid' => Yii::$app->employer->employerid
		] )->one ();
		$model->username = $userData ['username'];
		$model->email = $userData ['email'];
		$model->name = $employeData ['name'];
		$model->designation = $employeData ['designation'];
		$model->gender = $employeData ['gender'];
		$model->dateofbirth = $employeData ['dateofbirth'];
		$model->mobilenumber = $employeData ['mobilenumber'];
		$model->address = $employeData ['address'];
// 		return $this->redirect ( [
// 							'update'
// 					] );
		
		
		return $this->render('/company/profile', ['model' => $model,]);
	}


	public function actionUpdate() {
		
		$model = new EmployerSignup ();
		$employer = new Employer ();
		$userData = User::find ()->where ( [
				'id' => Yii::$app->employer->employerid
		] )->one ();
		$employeData = Employer::find ()->where ( [
				'employerid' => Yii::$app->employer->employerid
		] )->one ();
		$model->username = $userData ['username'];
		$model->email = $userData ['email'];
		$model->name = $employeData ['name'];
		$model->designation = $employeData ['designation'];
		$model->gender = $employeData ['gender'];
		$model->dateofbirth = $employeData ['dateofbirth'];
		$model->mobilenumber = $employeData ['mobilenumber'];
		$model->address = $employeData ['address'];
	if ($model->load ( Yii::$app->request->post () )) 
				{
			$employeuserData = User::find ()->where ( [
					'id' => Yii::$app->employer->employerid
			] )->one ();
			$employeupdateData = Employer::find ()->where ( [
					'employerid' => Yii::$app->employer->employerid
			] )->one ();
			$employeuserData ['username'] = $model->username;
			$employeuserData ['email'] = $model->email;
			$employeupdateData ['name'] = $model->name;
			$employeupdateData ['designation'] = $model->designation;
			$employeupdateData ['gender'] = $model->gender;
			$employeupdateData ['dateofbirth'] = $model->dateofbirth;
			$employeupdateData ['mobilenumber'] = $model->mobilenumber;
			$employeupdateData ['address'] = $model->address;
			$employeupdateData->update($employeupdateData);
			//$employeupdateData->update();
			 //print_r($employeupdateData->error);exit;
// 			Yii::$app->getSession ()->setFlash ('success', [
// 					'message' => 'You are successfully Updated Your Profile.'
// 			] );
			
			return $this->redirect ( [
					'profile'
			] );
		} else {
			return $this->render ( 'update', [
					'model' => $model,
					'$employer' =>$employer
			] );
		}
	}
	public function actionCompany()
	{
		$model = new EmployerCompany();
		if ($model->load(Yii::$app->request->post())) {
			$userid = Yii::$app->employer->employerid ;
			$model->userid=$userid;
			$model->save();
			//return $this->goHome();
			return $this->redirect ( [
					'empcompanyview'
			] );
			}else {
			return $this->render('employercompany', [
				'model' => $model,
		]);
	}
	}
	public function actionEmpcompanyview()
	{
		$model = User::find ()->Where (['id' => Yii::$app->employer->employerid])->one();
		$jobmodel = EmployerCompany :: find ()->Where (['userid' => Yii::$app->employer->employerid])->one();
		return $this->render('/company/empcompanyview', ['jobmodel' => $jobmodel,]);
	}
		public function actionEmployement()
	{ 
		$model = new Employement();
		if ($model->load(Yii::$app->request->post())) {
			$userid = Yii::$app->employer->employerid ;
			$model->userid=$userid;
			$model->save();
			echo "succesfully";
			return $this->goHome();
		}
			return $this->render('employement', ['model' => $model,]);
	}
	
	public function actionEducation()
	{
		$model = new EmployerEducation();
		if ($model->load(Yii::$app->request->post())) {
			$userid = Yii::$app->employer->employerid ;
			$model->userid=$userid;
			$model->save();
		
			return $this->redirect ( [
					'Eduprofile'
			] );
		}
		
		else{
			
		}
			return $this->render('education', [
				'model' => $model,
		]);
	}
	public function actionEduprofile()
	{
		$model = User::find ()->Where (['id' => Yii::$app->employer->employerid])->one();
		$edumodel = EmployerEducation :: find ()->Where (['userid' => Yii::$app->employer->employerid])->one();
		return $this->render('/company/eduprofile', ['edumodel' => $edumodel,]);
	}
	public function actionEduupdate()
	{
		$edumodel = EmployerEducation :: find ()->Where (['userid' => Yii::$app->employer->employerid])->one();
		$model = new EmployerEducation();
		$model->higherdegree = $edumodel->higherdegree;
		$model->specialization = $edumodel->specialization;
		$model->university = $edumodel->university;
		$model->collegename = $edumodel->collegename;
		$model->passingyear = $edumodel->passingyear;
		if ($model->load(Yii::$app->request->post()) ) {
			$edumodel->higherdegree = $model->higherdegree;
			$edumodel->specialization = $model->specialization ;
			$edumodel->university = $model->university;
			$edumodel->collegename = $model->collegename;
			$edumodel->passingyear = $model->passingyear;
			$edumodel->update();
			return $this->render('/company/eduprofile', ['edumodel' => $edumodel,]);
					}
			else {
			return $this->render('/company/eduupdate', [
					'model' => $model,
			]);
			}
		}	
		public function actionPreferences()
	{
		$model = new EmployerPreferences();
		if ($model->load(Yii::$app->request->post())) {
			$userid = Yii::$app->employer->employerid ;
			$model->userid=$userid;
			$model->save();
			return $this->redirect ( [
					'Preprofile'
			] );
		}
		return $this->render('preferences', [
				'model' => $model,
				]);
	}
	public function actionPreprofile()
	{
		$model = User::find ()->Where (['id' => Yii::$app->employer->employerid])->one();
		$empmodel = EmployerPreferences :: find ()->Where (['userid' => Yii::$app->employer->employerid])->one();
		return $this->render('/company/preprofile', ['empmodel' => $empmodel,]);
	}
	public function actionSkills()
	{
		$model = new EmployerSkills();
			if ($model->load(Yii::$app->request->post())) {
			$userid = Yii::$app->employer->employerid ;
			$model->userid=$userid;
			$model->save();
			return $this->goHome();
				}
			return $this->render('skills', [
				'model' => $model,
		]);
	
	}
	}