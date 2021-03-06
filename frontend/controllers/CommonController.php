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
use backend\models\Countries;
use backend\models\States;
use backend\models\Cities;
use yii\helpers\Json;

use frontend\models\EmployeeLanguages;


use frontend\models\RolesModel;


use yii\base\Object;
use yii\web\UploadedFile;



class CommonController extends Controller
{
	
	
	
	public function behaviors()
	{
	
		$permissionsArray = [''];
		//print_r(RolesModel::getRole());exit();
		if(RolesModel::getRole() == 3)
		{
			$permissionsArray = ['index','login','logout','contact','about','signup',
					'viewprofile','employee'
			];
		}
		else {
			$permissionsArray = ['index','login','logout','contact','about','signup',];
		}
	
	
		//print_r($permissionsArray);exit();
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
								'index','login','logout','contact','about','signup','viewprofile','employee'
	
						],
						'rules' => [
								[
										'actions' => $permissionsArray,
										'allow' => true,
										'matchCallback' => function ($rule, $action) {
												
											if((RolesModel::getRole() == 3) || (RolesModel::getRole() == 0))
											{
													
												return true;
											}
										}
								],
								[
										'denyCallback' => function ($rule, $action) {
												
											$this->redirect(Yii::$app->urlManager->createUrl(['employees-login']));
										}
								]
								]
								]
								];
	}
	
	
	
	
	
	
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
		
		
		$user = User::find ()->Where (['id' => Yii::$app->emplyoee->emplyoeeid])->one();
		$employee = EmployeeSignup :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
		$model->countriesList = Countries::getCountries();
		//print_r($employee);exit();
		$jobpreference = EmployeePreferences :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
		//print_r($jobpreference);exit();
		$education = EmployeeEducation :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
		$project = EmployeeProjects :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
		$skill = EmployeeSkills :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->all();
		$model->allSkills = $skill;
		//print_r($skill);exit();
		
	    // print_r($skill->skillname);exit();
		$employer = EmployeeEmployer :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
		$language = EmployeeLanguages :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->all();
		$model->alllanguages = $language;
		$resume = EmployeeResume :: find ()->Where (['userid' => Yii::$app->emplyoee->emplyoeeid])->one();
		//print_r($resume);exit;
		
		/* assign values from database to fields*/
		/*employeesignup details*/
	    if(!(empty($user)))
		{
		     $model->email = $user->email;
		}
		if (!(empty($resume)))
		{
			$model->resume = $resume->resume;
			
			
		}
		//print_r($resume->resume);exit();
		$model->statesData = [];
		$model->state =  '';
		$model->city = '';
		$model->citiesData = [];
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
        	if($employee->country != '')
        	{
        		$model->country = Countries::getCountryId($employee->country);
        		$model->statesData = Countries::getStatesByCountryview($model->country);
        		$model->state =  States::getStateId($employee->state);
        	}
        	else{
        		$model->country = $employee->country;
        		$model->statesData = [];
        		$model->state =  '';
        	}
        	if($model->state != '')
        	{
        		
        		$model->citiesData = Cities::getCiteslist($model->state);
        		$model->city = Cities::getCityId($employee->city);
        		
        	}
        	
//         	/print_r($model->statesData);exit();
        	//$model->state =  $employee->state;
        	//$model->city = $employee->city;
        	$model ->description = $employee -> description;
        	$model -> noticeperiod = $employee -> noticeperiod;
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
			$data=$model->skillsused;
				
			if (! Empty ( $data )) {
				$array = $model->skillsused;
			
					
				$array_skills = explode( ",",$array );
					
					
				$allsary = array();
				$valuary = array();
				foreach ($array_skills as $skillnew)
				{
					$allsary[$skillnew] = $skillnew;
					$valuary[] = $skillnew;
			
				}
				$model->allskills = $allsary;
				$model->skillsused = $valuary;
			
			}
			
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
			
			//print_r($model);exit();
		
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
				//print_r($model->profileimage);exit();
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
					$profileimage = '/profileimages/'.$imageName;
					$employee->profileimage = $profileimage;
				}
				//print_r(Countries::getCountryName($model->country));exit();
				$employee -> country = Countries::getCountryName($model->country);
				$employee -> state = States::getStateName($model->state);
				$employee -> city =  Cities::getCityName($model->city);
				//print_r($model->description);
				$employee -> description = $model -> description;
				$employee-> noticeperiod = $model-> noticeperiod;
				$employee -> updatedDate = date("Y-m-d H:i:s");
				$empmodel->userid = Yii::$app->emplyoee->emplyoeeid ;
				
				  
				$employee->update();
				//print_r($empmodel->errors);exit();
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
				//print_r($model->profileimage);exit();
				
				if(!(empty($model->profileimage)))
				{
					
					$imageName = time().$model->profileimage->name;
					//print_r($imageName);exit();
					$model->profileimage->saveAs('profileimages/'.$imageName );
					//$profileimage->saveAs(Yii::app()->basePath.'/.profileimages.//'.$imageName);
					//print_r(basePath.'/.profileimages.//'.$imageName);exit();
					
					$model->profileimage = 'profileimages/'.$imageName;
					//$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$fileName);
					$profileimage = '/profileimages/'.$imageName;
					$empmodel->profileimage = $profileimage;
				}
				$empmodel->country = Countries::getCountryName($model->country);
				$empmodel->state = States::getStateName($model->state);
				$empmodel->city = Cities::getCityName($model->city);
				$empmodel->description = $model->description;
				$empmodel->noticeperiod = $model->noticeperiod;
				$empmodel -> updatedDate = date("Y-m-d H:i:s");
				$empmodel->userid = Yii::$app->emplyoee->emplyoeeid ;
				//print_r($empmodel);exit();
				$empmodel-> save();
				//print_r($empmodel->errors);exit();
			
			}
			
			
			/*insert values into Education Table */
			
			
			if(!empty($education))
			{
				$education->highdegree = $model->highdegree;
				$education->specialization = $model->specialization;
				$education->university = $model->university;
				$education->collegename = $model->collegename;
				$education->passingyear = $model->passingyear;
				$education ->userid = Yii::$app->emplyoee->emplyoeeid ;
				$education -> save();
				
			}
			else
			{
				$edumodel->highdegree = $model->highdegree;
				$edumodel->specialization = $model->specialization;
				$edumodel->university = $model->university;
				$edumodel->collegename = $model->collegename;
				$edumodel->passingyear = $model->passingyear;
				$edumodel ->userid = Yii::$app->emplyoee->emplyoeeid ;
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
				$jobpreference ->userid = Yii::$app->emplyoee->emplyoeeid ;
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
				$jobmodel -> userid = Yii::$app->emplyoee->emplyoeeid ;
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
				//$project->prjskills = $model->skillsused;
				//print_r( $model->skillsused);exit();
				$skilluse = $model->skillsused;
				
				
				if (! Empty ( $skilluse )) {
					$array = $model->skillsused;
					$array_skills = implode ( ",",$array );
				}
				$project->prjskills = $array_skills;
				$project ->userid = Yii::$app->emplyoee->emplyoeeid ;
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
				//$projectmodel->prjskills = $model->skillsused;
				
				$skilluse = $model->skillsused;
				
				
				if (! Empty ( $skilluse )) {
					$array = $model->skillsused;
					$array_skills = implode ( ",",$array );
				}
				$projectmodel->prjskills = $array_skills;
				$projectmodel -> userid = Yii::$app->emplyoee->emplyoeeid ;
				$projectmodel -> save();
			}
			
			
			/* insert into skills table*/
			
			
		   if(!(empty($skill)))
			{
				
			 EmployeeSkills::deleteAll( ['userid' => Yii::$app->emplyoee->emplyoeeid]);
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
							$skillmodelnew->userid = Yii::$app->emplyoee->emplyoeeid ;
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
								$skillmodelnew->userid = Yii::$app->emplyoee->emplyoeeid ;
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
					$employer->userid = Yii::$app->emplyoee->emplyoeeid ;
					$employer-> save();
				}
				else {
					$employermodel->employername = $model->employername;
					$employermodel->employertype = $model->employertype;
					$employermodel->designation = $model->designation;
					$employermodel->userid = Yii::$app->emplyoee->emplyoeeid ;
					$employermodel-> save();
				}
				
				
				/* insert into languages table*/
				
				
				if(!(empty($language)))
				{
					
			 EmployeeLanguages::deleteAll( ['userid' => Yii::$app->emplyoee->emplyoeeid]);
			 $language= $model->language;
			    //print_r($model->skillname);exit();
			    
				if(isset($language))
				{
					$languageary=$model->language;
					//print_r($model->language);exit();
					$proficiencyary=$model->proficiencylevel;
					$langabilityary=$model->ability;
					
				     //print_r($model->ability);exit();
					//print_r($languageary);exit();
					//$newskillname = array();
					if(!empty($languageary))
					{
						
						for ($i=0;$i< count($languageary); $i++)
						{
							if(($languageary[$i] != '') && ($proficiencyary[$i] != '') && ($langabilityary[$i] != ''))
							{
								$abilitystring = implode(",",$langabilityary[$i]);
							$languagemodelnew = new EmployeeLanguages();
							$languagemodelnew->language = $languageary[$i];
							$languagemodelnew->proficiencylevel = $proficiencyary[$i];
							$languagemodelnew->ability =$abilitystring;
							$languagemodelnew->userid = Yii::$app->emplyoee->emplyoeeid ;
							$languagemodelnew->save();
							}
							
								
						}
				
					}
						
				}
		
             
				}
				else {
			
			 $language= $model->language;
			    //print_r($model->language);exit();
			    
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
							$abilitystring = implode(",",$langabilityary[$i]);
							$languagemodelnew = new EmployeeLanguages();
							$languagemodelnew->language = $languageary[$i];
							$languagemodelnew->proficiencylevel = $proficiencyary[$i];
							$languagemodelnew->ability =$abilitystring;
							$languagemodelnew->userid = Yii::$app->emplyoee->emplyoeeid ;
							$languagemodelnew->save();
							//print_r($languagemodelnew->errors);exit();
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
				$resume->userid = Yii::$app->emplyoee->emplyoeeid;
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
				$resumemodel->userid = Yii::$app->emplyoee->emplyoeeid ;
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
			
			
			Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 20000,
					'icon' => 'fa fa-users',
					'message' => 'You Are SuccessFully Updated.',
					'title' => 'Success',
					'positonY' => 'top',
					'positonX' => 'center'
			]);
			
		//	print_r($skillmodel->errors);exit();
		
			return Yii::$app->getResponse()->redirect(['employees-viewprofile', ] );
			
		}
		//echo 'hello';exit();
		return $this->render('employee', [
				'model' => $model,
		]);
			
		
	}
	
	
	
	
	
}
		
		
		
		
		
		
		
		
		
		
		
		
		

	
	






