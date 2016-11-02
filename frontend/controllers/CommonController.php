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
use common\models\User;
use frontend\models\EmployeeForm;
use frontend\models\EmployeeEducation;
use frontend\models\EmployeeSignup;
use frontend\models\SignupForm;
use frontend\models\EmployeePreferences;
use frontend\models\EmployeeSkills;



class CommonController extends Controller
{
	
	public function actionEmployee()
	{
		$model = new EmployeeForm();
		$educationmodel = new EmployeeEducation();
		$umodel = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		$empmodel = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$edumodel = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$jobmodel = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$skillmodel = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		
		if(!empty($umodel))
		{
			$model->email = $umodel->email;
			
		}
		if(!empty($empmodel))
		{
			$model->name = $empmodel->name;
			$model->surname = $empmodel->surname;
			$model->gender = $empmodel->gender;
			$model->dateofbirth = $empmodel->dateofbirth;
			$model->mobilenumber = $empmodel->mobilenumber;	
		}
		if(!empty($edumodel))
		{
			$model->highdegree = $edumodel->highdegree;
			$model->specialization = $edumodel->specialization;
			$model->university = $edumodel->university;
			$model->collegename = $edumodel->collegename;
			$model->passingyear = $edumodel->passingyear;
			
		}
		if(!empty($jobmodel))
		{
			$model->functionalarea = $jobmodel->functionalarea;
			$model->jobrole = $jobmodel->jobrole;
			$model->joblocation = $jobmodel->joblocation;
			$model->experience = $jobmodel->experience;
			$model->jobtype = $jobmodel->jobtype;
			$model->expectedsalary = $jobmodel->expectedsalary;
				
		}
		if(!empty($skillmodel))
		{
			
			$model->skillname = $skillmodel->skillname;
			$model->lastused = $skillmodel->lastused;
			$model->experience = $skillmodel->experience;
		}
		if (($model->load(Yii::$app->request->post())) && ($model->validate()) )
		{
			
			
			$userid = Yii::$app->user->id ;
			$model->userid=$userid;
			$model->save();
			
		}
		return $this->render('employee', [
				'model' => $model,
		]);
		
		
		
		
		
		
	
		
		
	}
}
		
		
		
		
		
		
		
		
		
		
		
		
		

	
	






