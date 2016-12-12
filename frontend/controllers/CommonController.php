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
use frontend\models\EmployeeProjects;
use frontend\models\EmployeeEmployer;
use frontend\models\EmployeeResume;

use frontend\models\EmployeeLanguages;


use yii\base\Object;
use yii\web\UploadedFile;



class CommonController extends Controller
{
	
	public function actionEmployee()
	{
		
		$this->layout= '@app/views/layouts/innerpagemain';
		$model = new EmployeeForm();
		$umodel = new SignupForm();
		$empmodel = new EmployeeSignup();
		$edumodel = new EmployeeEducation();
		$jobmodel = new EmployeePreferences();
		$skillmodel = new EmployeeSkills();
		$projectmodel = new EmployeeProjects();
		$employermodel = new EmployeeEmployer();
		$languagemodel = new EmployeeLanguages();
		$resumemodel = new EmployeeResume();
		
		
		/*getting all table values from database*/
		
		
		$user = User::find ()->Where (['id' => Yii::$app->user->id])->one();
		$employee = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		//print_r($employee);exit();
		$jobpreference = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		//print_r($jobpreference);exit();
		$education = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$project = EmployeeProjects :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$skill = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->user->id])->all();
		$model->allSkills = $skill;
		//print_r($skill);exit();
		
	    // print_r($skill->skillname);exit();
		$employer = EmployeeEmployer :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$language = EmployeeLanguages :: find ()->Where (['userid' => Yii::$app->user->id])->all();
		$model->alllanguages = $language;
		$resume = EmployeeResume :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		
		/* assign values from database to fields*/
		/*employeesignup details*/
	    if(!(empty($user)))
		{
		     $model->email = $user->email;
		}
		
		if(!(empty($employee)))
		{
			$model->profileimagenew = $employee->profileimage;
			//print_r($model->profileimage);exit();
			$model->name = $employee->name;
			$model->surname = $employee->surname;
			$model->gender = $employee->gender;
			$empdateofbirth= date('Y-m-d', strtotime($employee->dateofbirth));
			$model->dateofbirth = $empdateofbirth;
        	$model->mobilenumber = $employee->mobilenumber;		
		}
		
		/* employee education details*/
		
		
		if(!empty($education))
		{
			$model->highdegree = $education->highdegree;
			$model->specialization = $education->specialization;
			$model->university = $education->university;
			$model->collegename = $education->collegename;
			$model->passingyear = $education->passingyear;
		}
		
		
		/*employee job preference details*/
		
		if(!empty($jobpreference))
		{
			$model->functionalarea = $jobpreference->functionalarea;
			$model->jobrole = $jobpreference->jobrole;
			$model->joblocation = $jobpreference->joblocation;
			$model->experience = $jobpreference->experience;
			$model->jobtype = $jobpreference->jobtype;
			$model->expectedsalary = $jobpreference->expectedsalary;
		}
		
		
		/*employee project details*/
		
		if(!empty($project))
		{
			$model->projecttitle = $project->prjtitle;
			$startdate = date('Y-m-d', strtotime($project->prjstartdate));
			$model->projectstartdate=$startdate;
			$enddate = date('Y-m-d', strtotime($project->prjenddate));
			$model->projectenddate=$enddate;
			$model->projectlocation = $project->prjlocation;
			$model->employementtype = $project->emptype;
			$model->projectdescription = $project->prjdescription;
			$model->role = $project->prjrole;
			$model->roledescription = $project->prjroledescription;
			$model->teamsize = $project->teamsize;
			$model->skillsused= $project->prjskills;	
		}
	
		
		/*employee skills details*/
		
		
		/* if(!empty($skill))
		{
			$model->skillname = $skill->skillname;
			$model->lastused = $skill->lastused;
			$model->skillexperience = $skill->skillexperience;
		} */
		
		
		/*employee employement details*/
		
		if(!empty($employer))
		{
			$model->employername = $employer->employername;
			$model->employertype = $employer->employertype;
			$model->designation = $employer->designation;
			
		}
		
		
		/*employee known languages details*/
		
		/* if(!empty($language))
		{
			$model->language = $language->language;
			$model->proficiencylevel = $language->proficiencylevel;
			$langabilities=$language->ability;
			$langabilityarry = array();
			
			$langabilityry=$langabilities;
			$newlanguageary =  array();
			if($langabilityry != '')
			{
				$langabilityarry=explode(",",$langabilityry);
				for ($i=0;$i< count($langabilityarry); $i++)
				{
					$newlanguageary[$langabilityarry[$i]] = $langabilityarry[$i];
				}
				
			}
		 */
			/* $newlanguageary['Read'] = 'Read';
			  $newlanguageary['Speak'] = 'Speak'; */
		/* 	
			$model->ability =$newlanguageary;
			
		}
		 */
		/* if(!empty($resume))
		{
			
			$model->resume = $resume->resume;
			
		} */

		
		 /*insert values from fields to dtabse*/
		
		if (($model->load(Yii::$app->request->post())) && ($model->validate()) )
		{
			
			
			
			/* insert values into user and signup tables*/
			
		 if(!(empty($employee)))
			{
				
				$employee->name = 	$model->name;
				 $employee->surname = $model->surname;
				$employee->gender = $model->gender;
				$employeedateofbirth =  date('Y-m-d', strtotime($model->dateofbirth));
				$employee->dateofbirth =$employeedateofbirth;
				$employee->mobilenumber = $model->mobilenumber;
				$model->profileimage = UploadedFile::getInstance($model,'profileimage');
				
				if(!(empty($model->profileimage)))
				{	
					$profileimage=$model->profileimage;
					//print_r($model->profileimage);exit();
					$imageName = time().$model->profileimage->name;
					$imageName = time().$model->profileimage->name;
					//print_r($imageName);exit();
					$model->profileimage->saveAs('profileimages/'.$imageName );
					//$profileimage->saveAs(Yii::app()->basePath.'/.profileimages.//'.$imageName);
					//print_r(basePath.'/.profileimages.//'.$imageName);exit();
					 
					$model->profileimage = 'profileimages/'.$imageName;
					//$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$fileName);
					$profileimage = '/frontend/web/profileimages/'.$imageName;
					$employee->profileimage = $profileimage;
				}
				  
				$employee-> save();
				
			}
			else 
			{
				
				$empmodel->name = $model->name;
				$empmodel->surname = $model->surname;
				$empmodel->gender = $model->gender;
				$empmodel->mobilenumber = $model->mobilenumber;
				$empmodeldateofbirth = date('Y-m-d', strtotime($model->dateofbirth));
				$empmodel->dateofbirth = $empmodeldateofbirth;
				
				
				$model->profileimage = UploadedFile::getInstance($model,'profileimage');
				
				
				if(!(empty($model->profileimage)))
				{
					
					$imageName = time().$model->profileimage->name;
					//print_r($imageName);exit();
					$model->profileimage->saveAs('profileimages/'.$imageName );
					//$profileimage->saveAs(Yii::app()->basePath.'/.profileimages.//'.$imageName);
					//print_r(basePath.'/.profileimages.//'.$imageName);exit();
					
					$model->profileimage = 'profileimages/'.$imageName;
					//$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$fileName);
					$profileimage = '/frontend/web/profileimages/'.$imageName;
					$empmodel->profileimage = $profileimage;
				}
				
				$empmodel-> save();
			
			}
			
			
			/*insert values into Education Table */
			
			
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
			
			
			/*insert values into preferences table*/
			
			if(!empty($jobpreference))
			{
				$jobpreference->functionalarea = $model->functionalarea;
				$jobpreference->jobrole = $model->jobrole;
				$jobpreference->joblocation = $model->joblocation;
				$jobpreference->experience = $model->experience;
				$jobpreference->jobtype = $model->jobtype;
				$jobpreference->expectedsalary = $model->expectedsalary;
				$jobpreference ->userid = Yii::$app->user->id ;
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
			
			
			
			/*insert into projects table*/
			
			
			if(!empty($project))
			{
				$project->prjtitle = $model->projecttitle;
				$pjstartdate =   date('Y-m-d', strtotime($model->projectstartdate));
				$project->prjstartdate= $pjstartdate ;
				$pjenddate =   date('Y-m-d', strtotime($model->projectenddate));
				$project->prjenddate= $pjenddate ;
				$project->prjlocation = $model->projectlocation;
				$project->emptype = $model->employementtype;
				$project->prjdescription = $model->projectdescription;
				$project->prjrole = $model->role;
				
			
				$project->prjroledescription = $model->roledescription;
				$project->teamsize = $model->teamsize;
				$project->prjskills = $model->skillsused;
				$project ->userid = Yii::$app->user->id ;
				$project -> save();
					
			}
			else
			{
				$projectmodel->prjtitle = $model->projecttitle;
				$prstartdate =   date('Y-m-d', strtotime($model->projectstartdate));
				$projectmodel->prjstartdate =$prstartdate;
				$prenddate =   date('Y-m-d', strtotime($model->projectenddate));
				$projectmodel->prjenddate =$prenddate;
				$projectmodel->prjlocation = $model->projectlocation;
				$projectmodel->emptype = $model->employementtype;
				$projectmodel->prjdescription = $model->projectdescription;
				$projectmodel->prjrole = $model->role;
				$projectmodel->prjroledescription = $model->roledescription;
				$projectmodel->teamsize = $model->teamsize;
				$projectmodel->prjskills = $model->skillsused;
				$projectmodel -> userid = Yii::$app->user->id ;
				$projectmodel -> save();
			}
			
			
			/* insert into skills table*/
			
			
		   if(!(empty($skill)))
			{
				
			 EmployeeSkills::deleteAll( ['userid' => Yii::$app->user->id]);
			 $skillname= $model->skillname;
			    //print_r($model->skillname);exit();
			    
				if(isset($skillname))
				{
					$skillnameary=$model->skillname;
					$lastusedary=$model->lastused;
					$skillexperienceary=$model->skillexperience;
					
					//print_r($skillnameary);exit();
					//$newskillname = array();
					if(!empty($skillnameary))
					{
						
						for ($i=0;$i< count($skillnameary); $i++)
						{
							if(($skillnameary[$i] != '') && ($lastusedary[$i] != '') && ($skillexperienceary[$i] != ''))
							{
							$skillmodelnew = new EmployeeSkills();
							$skillmodelnew->skillname = $skillnameary[$i];
							$skillmodelnew->lastused = $lastusedary[$i];
							$skillmodelnew->skillexperience = $skillexperienceary[$i];
							$skillmodelnew->userid = Yii::$app->user->id ;
							$skillmodelnew->save();
							}
							
								
						}
				
					}
						
				}
		
             
			}
			
			else {
				
				$skillname= $model->skillname;
				//print_r($model->skillname);exit();
				 
				if(isset($skillname))
				{
					$skillnameary=$model->skillname;
					$lastusedary=$model->lastused;
					$skillexperienceary=$model->skillexperience;
						
					//print_r($skillnameary);exit();
					//$newskillname = array();
					if(!empty($skillnameary))
					{
						for ($i=0;$i< count($skillnameary); $i++)
						{
							if(($skillnameary[$i] != '') && ($lastusedary[$i] != '') && ($skillexperienceary[$i] != ''))
							{
								$skillmodelnew = new EmployeeSkills();
								$skillmodelnew->skillname = $skillnameary[$i];
								$skillmodelnew->lastused = $lastusedary[$i];
								$skillmodelnew->skillexperience = $skillexperienceary[$i];
								$skillmodelnew->userid = Yii::$app->user->id ;
								$skillmodelnew->save();
							}
								
				
						}
				
					}
				
				}
				
				
			}
              
			
			  /* insert into employer table*/
			
			
			
				if(!(empty($employer)))
				{
					$employer->employername = $model->employername;
					$employer->employertype = $model->employertype;
					$employer->designation = $model->designation;
					$employer->userid = Yii::$app->user->id ;
					$employer-> save();
				}
				else {
					$employermodel->employername = $model->employername;
					$employermodel->employertype = $model->employertype;
					$employermodel->designation = $model->designation;
					$employermodel->userid = Yii::$app->user->id ;
					$employermodel-> save();
				}
				
				
				/* insert into languages table*/
				
				
				if(!(empty($language)))
				{
					
			 EmployeeLanguages::deleteAll( ['userid' => Yii::$app->user->id]);
			 $language= $model->language;
			    //print_r($model->skillname);exit();
			    
				if(isset($language))
				{
					$languageary=$model->language;
					$proficiencyary=$model->proficiencylevel;
					$langabilityary=$model->ability;
					//print_r($model->ability);exit();
					//print_r($skillnameary);exit();
					//$newskillname = array();
					if(!empty($languageary))
					{
						
						for ($i=0;$i< count($languageary); $i++)
						{
							if(($languageary[$i] != '') && ($proficiencyary[$i] != '') && ($langabilityary[$i] != ''))
							{
							$languagemodelnew = new EmployeeLanguages();
							$languagemodelnew->language = $languageary[$i];
							$languagemodelnew->proficiencylevel = $proficiencyary[$i];
							$languagemodelnew->ability =$langabilityary[$i];
							$languagemodelnew->userid = Yii::$app->user->id ;
							$languagemodelnew->save();
							}
							
								
						}
				
					}
						
				}
		
             
				}
				else {
			
			 $language= $model->language;
			   // print_r($model->language);exit();
			    
				if(isset($language))
				{
					$languageary=$model->language;
					//print_r($model->proficiencylevel);exit();
					$proficiencyary=$model->proficiencylevel;
					//print_r($model->ability);exit();
					$langabilityary=$model->ability;
					
					//print_r($skillnameary);exit();
					//$newskillname = array();
					if(!empty($languageary))
					{
						
						for ($i=0;$i< count($languageary); $i++)
						{
							if(($languageary[$i] != '') && ($proficiencyary[$i] != '') && ($langabilityary[$i] != ''))
							{
							$languagemodelnew = new EmployeeLanguages();
							$languagemodelnew->language = $languageary[$i];
							$languagemodelnew->proficiencylevel = $proficiencyary[$i];
							$languagemodelnew->ability =$langabilityary[$i];
							$languagemodelnew->userid = Yii::$app->user->id ;
							$languagemodelnew->save();
							}
							
								
						}
				
					}
						
				}
		
				}
				
				
				if(!(empty($resume)))
				{
					$model->resume = UploadedFile::getInstance($model,'resume');
					if(!(empty($model->resume)))
					{
					
					$res=$model->resume;
				  //print_r($model->profileimage);exit();
				  $resumeName = time().$model->resume->name;
				   if(!(empty($model->resume)))
				    {
					            $resumeName = time().$model->resume->name;
					 //print_r($imageName);exit();
					            $model->resume->saveAs('uploadresume/'.$resumeName );
					 //$profileimage->saveAs(Yii::app()->basePath.'/.profileimages.//'.$imageName);
					 //print_r(basePath.'/.profileimages.//'.$imageName);exit();
					
					            $model->resume = 'uploadresume/'.$resumeName;
					//$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$fileName);
				    }
				 $res = '/frontend/web/uploadresume/'.$resumeName;
				$resume->resume = $res;
				$resume->userid = Yii::$app->user->id;
				$resume-> save();
					}
				
				}
				else
				{
					$model->resume = UploadedFile::getInstance($model,'resume');
					if(!(empty($model->resume)))
					{
					
						$res=$model->resume;
				//print_r($model->resume);exit();
				$resumeName = time().$model->resume->name;
				if(!(empty($model->resume)))
				{
					$resumeName = time().$model->resume->name;
					//print_r($imageName);exit();
					$model->resume->saveAs('uploadresume/'.$resumeName );
					//$profileimage->saveAs(Yii::app()->basePath.'/.profileimages.//'.$imageName);
					//print_r(basePath.'/.profileimages.//'.$imageName);exit();
					
					$model->resume= 'uploadresume/'.$resumeName;
					//$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$fileName);
				}
				$res = '/frontend/web/uploadresume/'.$resumeName;
				$resumemodel->resume = $res; 
				$resumemodel->userid = Yii::$app->user->id ;
				$resumemodel-> save();
					}
				}
					
				
				
				
				
				
			/*insert into usewr table*/	
				
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
		
		
		
		
		
		
		
		
		
		
		
		
		

	
	






