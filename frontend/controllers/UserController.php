<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use frontend\models\EmployeePreferences;
use frontend\models\EmployeeSkills;
use frontend\models\EmployeeEducation;
use frontend\models\EmployeeSignup;
use frontend\models\SignupForm;
use common\models\User;


class UserController extends Controller
{
	
	public function actionProfile()
	{
	
	
		//$model = $model = User::find()->all();
		//print_r($model);
		$umodel = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		//print_r($model);
	
	
		$empmodel = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		//print_r($empmodel);
		
	
	
		return $this->render('/user/profile', ['empmodel' => $empmodel,'umodel' => $umodel,]);
	}
	public function actionUpdate()
	{
	
	
		//$model = $model = User::find()->all();
		//print_r($model);
		$umodel = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		//print_r($model);
	
	
		$empmodel = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		
		
		$model = new SignupForm();
		$model->name = $empmodel->name;
		$model->surname = $empmodel->surname;
		$model->email = $umodel->email;
		$model->gender = $empmodel->gender;
		$model->dateofbirth = $empmodel->dateofbirth;
		$model->mobilenumber = $empmodel->mobilenumber;
		
		
		
		if ($model->load(Yii::$app->request->post()) ) {
			
			
			
			
			$empmodel->name = $model->name;
			$empmodel->surname = $model->surname;
			$umodel->email = $model->email;
			$empmodel->gender = $model->gender;
			$empmodel->dateofbirth = $model->dateofbirth;
			$empmodel->mobilenumber = $model->mobilenumber;
				
			
			$empmodel->update();
			$umodel->update();
			return $this->render('/user/profile', ['empmodel' => $empmodel,'umodel' => $umodel,]);
			
				
			
		} 
		else {
			return $this->render('/user/update', [
					'model' => $model,
			]);
		
		
		
		//print_r($empmodel);
	
	}
}
	
	
	
	
	public function actionEducation()
	{
		$model = new EmployeeEducation();
		//$employeesignup = new EmployeeSignup();
		
	
		if ($model->load(Yii::$app->request->post())) {
			
			
			$userid = Yii::$app->user->id ;
			$model->userid=$userid;
			$model->save();
			return $this->goHome();
			/*  
			//print_r(Yii::$app->request->post());exit();
	
			if ($user = $model-> signup()) {
				return $this->goHome();
				if (Yii::$app->getUser()->login($user)) {
					return $this->goHome
				}
			} */
		}
	
		return $this->render('education', [
				'model' => $model,
		]);
	}
	
	
	

	public function actionEduprofile()
	{
	
	
		//$model = $model = User::find()->all();
		//print_r($model);
		$model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		//print_r($model);
	
	
		$edumodel = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		//print_r($edumodel);
	
	
	
		return $this->render('/user/eduprofile', ['edumodel' => $edumodel,]);
	}

	public function actionEduupdate()
	{
	
		$edumodel = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();

		$model = new EmployeeEducation();
		$model->highdegree = $edumodel->highdegree;
		$model->specialization = $edumodel->specialization;
		$model->university = $edumodel->university;
		$model->collegename = $edumodel->collegename;
		$model->passingyear = $edumodel->passingyear;
		
		
		
		
		if ($model->load(Yii::$app->request->post()) ) {
				
				
				
				
			$edumodel->highdegree = $model->highdegree;
			$edumodel->specialization = $model->specialization ;
			$edumodel->university = $model->university;
			
			$edumodel->collegename = $model->collegename;
			$edumodel->passingyear = $model->passingyear;
		
				
			$edumodel->update();
			
			return $this->render('/user/eduprofile', ['edumodel' => $edumodel,]);
			
			
		}

			else {
				return $this->render('/user/eduupdate', [
						'model' => $model,
				]);
			
			
			
				//print_r($empmodel);
			}
		
	}
	
	public function actionPreferences()
	{
		$model = new EmployeePreferences();
		//$employeesignup = new EmployeeSignup();
	
	
		if ($model->load(Yii::$app->request->post())) {
				
				
			$userid = Yii::$app->user->id ;
			$model->userid=$userid;
			$model->save();
			return $this->goHome();
				
			/*
				//print_r(Yii::$app->request->post());exit();
	
				if ($user = $model-> signup()) {
				return $this->goHome();
				if (Yii::$app->getUser()->login($user)) {
				return $this->goHome
				}
			} */
		}

		return $this->render('preferences', [
				'model' => $model,
				]);
	}
	
	

	public function actionJobprofile()
	{
	
	
		//$model = $model = User::find()->all();
		//print_r($model);
		$model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		//print_r($model);
	
	
		$jobmodel = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		//print_r($edumodel);
	
	
	
		return $this->render('/user/jobprofile', ['jobmodel' => $jobmodel,]);
	}
	
	public function actionPreferupdate()
	{
	
	
		//$model = $model = User::find()->all();
		//print_r($model);
		//$model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		//print_r($model);
	
	
		$jobmodel = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
	
		$model = new EmployeePreferences();
		$model->functionalarea = $jobmodel->functionalarea;
		$model->jobrole = $jobmodel->jobrole;
		$model->joblocation = $jobmodel->joblocation;
		$model->experience = $jobmodel->experience;
		$model->jobtype = $jobmodel->jobtype;
		$model->expectedsalary = $jobmodel->expectedsalary;
	
	
	
	
		if ($model->load(Yii::$app->request->post()) ) {
	
	
	
	
			$jobmodel->functionalarea = $model->functionalarea;
			$jobmodel->jobrole = $model->jobrole ;
			$jobmodel->joblocation = $model->joblocation;
	
			$jobmodel->experience = $model->experience;
			$jobmodel->jobtype = $model->jobtype;
			$jobmodel->expectedsalary = $model->expectedsalary;
	
	
			$jobmodel->update();
	
			return $this->render('/user/jobprofile', ['jobmodel' => $jobmodel,]);
	
	
		}
	
		else {
			return $this->render('/user/preferupdate', [
					'model' => $model,
			]);
	
	
	
			//print_r($empmodel);
		}
	
	}
	
	
	
	
	
	public function actionSkills()
	{
		$model = new EmployeeSkills();
		//$employeesignup = new EmployeeSignup();
	
	
		if ($model->load(Yii::$app->request->post())) {
				
				
			$userid = Yii::$app->user->id ;
			$model->userid=$userid;
			$model->save();
			return $this->goHome();
			/*
				//print_r(Yii::$app->request->post());exit();
	
				if ($user = $model-> signup()) {
				return $this->goHome();
				if (Yii::$app->getUser()->login($user)) {
				return $this->goHome
				}
			} */
		}

		return $this->render('skills', [
				'model' => $model,
		]);
	
	
	
	
	
}
public function actionSkillprofile()
{


	//$model = $model = User::find()->all();
	//print_r($model);
	$model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
	//print_r($model);


	$skillmodel = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
	//print_r($edumodel);



	return $this->render('/user/skillprofile', ['skillmodel' => $skillmodel,]);
}

public function actionSkillupdate()
{


	//$model = $model = User::find()->all();
	//print_r($model);
	//$model = User::find ()->Where (['id' => Yii::$app->user->id])->one();
	//print_r($model);


	$skillmodel = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();

	$model = new EmployeeSkills();
	$model->skillname = $skillmodel->skillname;
	$model->lastused = $skillmodel->lastused;
	$model->experience = $skillmodel->experience;
	




	if ($model->load(Yii::$app->request->post()) ) {




		$skillmodel->skillname = $model->skillname;
		$skillmodel->lastused = $model->lastused;
		$skillmodel->experience = $model->experience;

		$skillmodel->update();

		return $this->render('/user/skillprofile', ['skillmodel' => $skillmodel,]);


	}

	else {
		return $this->render('/user/skillupdate', [
				'model' => $model,
		]);



		//print_r($empmodel);
	}

}













}


