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
use yii\base\Object;
use yii\web\UploadedFile;



class CommonController extends Controller
{
	
	public function actionEmployee()
	{
		$model = new EmployeeForm();
		$umodel = new SignupForm();
		$empmodel = new EmployeeSignup();
		$edumodel = new EmployeeEducation();
		$jobmodel = new EmployeePreferences();
		$skillmodel = new EmployeeSkills();
		$user = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		$employee = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$jobpreference = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$education = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$skill = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
	    if(!(empty($user)))
		{
		$model->email = $user->email;
		}
		if(!(empty($employee)))
		{
			$model->name = $employee->name;
			$model->surname = $employee->surname;
			$model->gender = $employee->gender;
			$model->dateofbirth = $employee->dateofbirth;
			$model->mobilenumber = $employee->mobilenumber;
			$model->profileimage = $employee->profileimage;
			
		}
		if(!empty($education))
		{
			$model->highdegree = $education->highdegree;
			$model->specialization = $education->specialization;
			$model->university = $education->university;
			$model->collegename = $education->collegename;
			$model->passingyear = $education->passingyear;
		}
		if(!empty($jobpreference))
		{
			$model->functionalarea = $jobpreference->functionalarea;
			$model->jobrole = $jobpreference->jobrole;
			$model->joblocation = $jobpreference->joblocation;
			$model->experience = $jobpreference->experience;
			$model->jobtype = $jobpreference->jobtype;
			$model->expectedsalary = $jobpreference->expectedsalary;
		}
		if(!empty($skill))
		{
			$model->skillname = $skill->skillname;
			$model->lastused = $skill->lastused;
					}

		if (($model->load(Yii::$app->request->post())) && ($model->validate()) )
		{
		 if(!(empty($employee)))
			{
				
				$employee->name = 	$model->name;
				$employee->surname = $model->surname;
				$employee->gender = $model->gender;
				$employee->dateofbirth = $model->dateofbirth;
				$employee->mobilenumber = $model->mobilenumber;
				$employee-> save();
			}
			else 
			{
				
				$empmodel->name = $model->name;
				$empmodel->surname = $model->surname;
				$empmodel->gender = $model->gender;
				$empmodel->mobilenumber = $model->mobilenumber;	
				$empmodel-> save();				
			}
			if(!empty($education))
			{
				$education->highdegree = $model->highdegree;
				$education->specialization = $model->specialization;
				$education->university = $model->university;
				$education->collegename = $model->collegename;
				$education->passingyear = $model->passingyear;
				$education ->userid = Yii::$app->user->id ;
				$education -> save();
				
			}
			else
			{
				$edumodel->highdegree = $model->highdegree;
				$edumodel->specialization = $model->specialization;
				$edumodel->university = $model->university;
				$edumodel->collegename = $model->collegename;
				$edumodel->passingyear = $model->passingyear;
				$edumodel ->userid = Yii::$app->user->id ;
				$edumodel -> save();
					
			}
			if(!empty($jobpreference))
			{
				$jobpreference->functionalarea = $model->functionalarea;
				$jobpreference->jobrole = $model->jobrole;
				$jobpreference->joblocation = $model->joblocation;
				$jobpreference->experience = $model->experience;
				$jobpreference->jobtype = $model->jobtype;
				$jobpreference->expectedsalary = $model->expectedsalary;
				$jobpreference -> userid = Yii::$app->user->id ;
				$jobpreference -> save();
			
			}
			else
			{
				$jobmodel->functionalarea = $model->functionalarea;
				$jobmodel->jobrole = $model->jobrole;
				$jobmodel->joblocation = $model->joblocation;
				$jobmodel->experience = $model->experience;
				$jobmodel->jobtype = $model->jobtype;
				$jobmodel->expectedsalary = $model->expectedsalary;
				$jobmodel -> userid = Yii::$app->user->id ;
				$jobmodel -> save();
			}
		if(!(empty($skill)))
			{
				$skill->skillname = $model->skillname;
				$skill->lastused = $model->lastused;
				$skill->userid = Yii::$app->user->id ;
				$skill-> save();
			}
			else {
				$skillmodel->skillname = $model->skillname;
				$skillmodel->lastused = $model->lastused;
				$skillmodel->userid = Yii::$app->user->id ;
				$skillmodel-> save();
				}
		if(!(empty($user)))
			{
				$user->email = $model->email;
				$user-> save();
				}
			else 
			{
				$umodel->email = $model->email;
				$umodel-> save();
				}
		
		//	print_r($skillmodel->errors);exit();
			return Yii::$app->getResponse()->redirect(['site/viewprofile', 'userid' => Yii::$app->user->id ] );
		}
		return $this->render('employee', [
				'model' => $model,
		]);
		
		
		
		
		
		
	
		
		
	}
}
		
		
		
		
		
		
		
		
		
		
		
		
		

	
	






