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
//use frontend\models\EmployerCompany;
use frontend\models\EmployerForm;
use frontend\models\EmployerJobpostings;
use frontend\models\JobpostSearch;

use frontend\models\EmployeeJobapplied;
use yii\data\ActiveDataProvider;
use yii\db\Query ;
use yii\helpers\ArrayHelper;
use frontend\models\EmployerRolesModel;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\models\EmployeeResume;
use kartik\mpdf\Pdf;
use kartik\social\FacebookPlugin;
use backend\models\EmployerPackages;
use backend\models\Memberships;
use backend\models\Countries;
use backend\models\States;
use backend\models\Cities;
use yii\helpers\Json;
use frontend\models\EmployeeSkills;
use frontend\models\EmployeeJobsearch;
use frontend\models\EmployeeEmployer;
//use kartik\growl\Growl;
use frontend\models\SignupForm;
use backend\models\Designation;
use frontend\models\JobSkills;
use frontend\models\JobLocations;








class EmpcommonController extends Controller {
	
	public function behaviors()
	{
	
		$permissionsArray = [''];
		
		if(EmployerRolesModel::getRole() == 2)
		{
			$permissionsArray = ['employer','employercommonview','delete','update','view','create','jobpostingsview','jobpostingslist','employeelist'
			];
		}
		else {
			$permissionsArray = [''];
		}
	
	
		
		return [
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								
						],
				],
				'access' => [
						'class' => AccessControl::className(),
						'only' => [
								'employer','employercommonview','delete','update','view','create','jobpostingsview','jobpostingslist','employeelist'
	
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
	public function actionEmployer() {
		$this->layout = '@app/views/layouts/employerinner';
		$model = new EmployerForm ();
		$employerSignup = new EmployerSignup ();
		$employermodel = new Employer ();
		$educationModel = new EmployerEducation ();
		$employmentModel = new Employement ();
		$preferencesModel = new EmployerPreferences ();
		//echo Yii::$app->employer->employerid;exit();
		$userData = User::find ()->where ( [ 
				'id' => Yii::$app->employer->employerid 
		] )->one ();
		$employeData = Employer::find ()->where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$educationData = EmployerEducation::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$employmentData = Employement::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$preferencesData = EmployerPreferences::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		
		if (! (empty ( $employeData ))) {
			$model->first_name = $employeData->first_name;
			$model->last_name = $employeData->last_name;
			$model->designation = $employeData->designation;
			$model->gender = $employeData->gender;
			$model->dateofbirth = $employeData->dateofbirth;
			$model->mobilenumber = $employeData->mobilenumber;
			$model->landline = $employeData->landline;
			$model->address = $employeData->address;
			$model->description = $employeData->description;
			$model->profileimagenew = $employeData->profileimage;
			$model->skills = $employeData->skills;
			$data=$model->skills;
			
			
			if (! Empty ( $data )) {
				$array = $model->skills;
				
				$array_skills = explode( ",",$array );
			
			$allsary = array();
			$valuary = array();
			foreach ($array_skills as $skillnew)
			{
				$allsary[$skillnew] = $skillnew;
				$valuary[] = $skillnew;
				
			}
				$model->allskills = $allsary;
				$model->skills = $valuary;
				
				
			}
			
		}
		if (! (empty ( $userData ))) {
			$model->username = $userData->username;
			$model->email = $userData->email;
		}
		

		if (! (empty ( $educationData ))) {
			$model->higherdegree = $educationData->higherdegree;
			$model->specialization = $educationData->specialization;
			$model->university = $educationData->university;
			$model->collegename = $educationData->collegename;
			$model->passingyear = $educationData->passingyear;
		}
 		if (! (empty ( $skillsData ))) {
 			$model->skills = $skillsData->skills;
 			
 	 		}
		
		if (! (empty ( $employmentData ))) {
			$model->company_name = $employmentData->company_name;
			$model->job_title = $employmentData->job_title;
			$model->job_type = $employmentData->job_type;
			$model->job_description = $employmentData->job_description;
			$model->experience = $employmentData->experience;
			$model->work_location = $employmentData->work_location;
			$model->shift_timings = $employmentData->shift_timings;
			$model->weekly_days = $employmentData->weekly_days;
			$model->salary = $employmentData->salary;
		}
		if (! (empty ( $preferencesData ))) {
			$model->expected_salary = $preferencesData->expected_salary;
			$model->job_location = $preferencesData->job_location;
			$model->job_role = $preferencesData->job_role;
		}
		
		if (($model->load ( Yii::$app->request->post () )) && ($model->validate ())) {
			
			if (! (empty ( $employeData ))) {
				$employeData->name = $model->name;
				$employeData->designation = $model->designation;
				$employeData->gender = $model->gender;
				$companyDataa = date ( 'Y-m-d', strtotime ( $model->dateofbirth ) );
				$employeData->dateofbirth = $companyDataa;
				$employeData->mobilenumber = $model->mobilenumber;
				$employeData->address = $model->address;
				$model->profileimage = UploadedFile::getInstance ( $model, 'profileimage' );
				$employeData->skills = $model->skills;

                $skill = $model->skills;
                  
	
				if (! Empty ( $skill )) {
					$array = $model->skills;
					$array_skills = implode ( ",",$array );
				}
				
				if(!(empty($model->profileimage)))
				{
					$profileimage=$model->profileimage;
			
					$imageName = time().$model->profileimage->name;
				
					$model->profileimage->saveAs('profileimages/'.$imageName );
				
					$model->profileimage = 'profileimages/'.$imageName;
				
					$profileimage = '/frontend/web/profileimages/'.$imageName;
					$employeData->profileimage = $profileimage;
				
				}
				
				$employeData->skills=$array_skills;
				$employeData->save ();
			
			} 

			else {
				
				$employermodel->name = $model->name;
				
				$employermodel->designation = $model->designation;
				$employermodel->gender = $model->gender;
			
				$companyDataa = date ( 'Y-m-d', strtotime ( $model->dateofbirth ) );
				$employermodel->dateofbirth = $companyDataa;
				$employermodel->mobilenumber = $model->mobilenumber;
				$employermodel->address = $model->address;
				$employermodel->userid = Yii::$app->employer->employerid;
				$model->profileimage = UploadedFile::getInstance($model,'profileimage');
				$employermodel->skills = $model->skills;
				
			     $employermodel = $model->skills;
			  
					
				if (! Empty ( $employermodel )) {
					$array = $model->skills;
					$comma_separated = implode ( ",",$array );
				}
				
				
				
				if(!(empty($model->profileimage)))
				{
						
					$imageName = time().$model->profileimage->name;
				
					$model->profileimage->saveAs('profileimages/'.$imageName );
				
						
					$model->profileimage = 'profileimages/'.$imageName;
				
					$profileimage = '/frontend/web/profileimages/'.$imageName;
					$employermodel->profileimage = $profileimage;
				}
				
				$employermodel->skills=$comma_separated;
				$employermodel->save ();
				
			}
			

			if (! (empty ( $educationData ))) {
				$educationData->higherdegree = $model->higherdegree;
				$educationData->specialization = $model->specialization;
				$educationData->university = $model->university;
				$educationData->collegename = $model->collegename;
				$educationData->passingyear = $model->passingyear;
				$educationData->save ();
				
			} else {
				$educationModel->higherdegree = $model->higherdegree;
				$educationModel->specialization = $model->specialization;
				$educationModel->university = $model->university;
				$educationModel->collegename = $model->collegename;
				$educationModel->passingyear = $model->passingyear;
				$educationModel->userid = Yii::$app->employer->employerid;
				$educationModel->save ();
				
			}
		
			if (! (empty ( $employmentData ))) {
				$employmentData->company_name = $model->company_name;
				$employmentData->job_title = $model->job_title;
				$employmentData->job_type = $model->job_type;
				$employmentData->job_description = $model->job_description;
				$employmentData->experience = $model->experience;
				$employmentData->work_location = $model->work_location;
				$employmentData->shift_timings = $model->shift_timings;
				$employmentData->weekly_days = $model->weekly_days;
				$employmentData->salary = $model->salary;
				$employmentData->job_role = '';
				$employmentData->save ();
			} else {
				$employmentModel->company_name = $model->company_name;
				$employmentModel->job_title = $model->job_title;
				$employmentModel->job_type = $model->job_type;
				$employmentModel->job_description = $model->job_description;
				$employmentModel->experience = $model->experience;
				$employmentModel->work_location = $model->work_location;
				$employmentModel->shift_timings = $model->shift_timings;
				$employmentModel->weekly_days = $model->weekly_days;
				$employmentModel->salary = $model->salary;
				$employmentModel->userid = Yii::$app->employer->employerid;
				$employmentModel->job_role = '';
				$employmentModel->save ();
			  
			
			}
			if (! (empty ( $preferencesData ))) {
				$preferencesData->expected_salary = $model->expected_salary;
				$preferencesData->job_location = $model->job_location;
				$preferencesData->job_role = $model->job_role;
				$preferencesData->save ();
			} else {
				$preferencesModel->expected_salary = $model->expected_salary;
				$preferencesModel->job_location = $model->job_location;
				$preferencesModel->job_role = $model->job_role;
				$preferencesModel->userid = Yii::$app->employer->employerid;
				$preferencesModel->save ();
			}
			
			Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 20000,
					'icon' => 'fa fa-users',
					'message' => 'successfully  Updated.',
					'title' => 'Success',
					'positonY' => 'top',
					'positonX' => 'center'
			]);
		
 			return Yii::$app->getResponse ()->redirect ( [ 
 					'employers-profile'
 			] );
		}
		
		return $this->render ( 'comview', [ 
				'model' => $model 
		]
		 );
	}
	public function actionEmployercommonview() {
		$this->layout = '@app/views/layouts/employerinner';
		$model = new EmployerForm ();
		$model = User::find ()->where ( [ 
				'id' => Yii::$app->employer->employerid 
		] )->one ();
		$employemodel = Employer::find ()->where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();

	
		$edumodel = EmployerEducation::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
	
		$skillsmodel = EmployerSkills::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$employmentmodel = Employement::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$preferencesmodel = EmployerPreferences::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		
		return $this->render ( 'employercommonview', [ 
				'preferencesmodel' => $preferencesmodel,
				'employmentmodel' => $employmentmodel,
				'skillsmodel' => $skillsmodel,
				'employemodel' => $employemodel,
				
				'edumodel' => $edumodel,
				'model' => $model 
		] );
	}
	public function actionCreate() {
		$model = new EmployerJobpostings ();
		$userId = Yii::$app->employer->employerid;
		$presentDate = date('Y-m-d');
		$packageInfoByUser = EmployerPackages::find()->where("userid = $userId AND status = 1 AND endDate >= '$presentDate'")->one();
		$model->countriesList = Countries::getCountries();
		
		
		//print_r($packageInfoByUser);exit();
		if(!empty($packageInfoByUser))
		{
			
			
			//echo 'hello';exit();
			$membershipsInfo = Memberships::find()->where(['mem_id' => $packageInfoByUser->mem_id])->one();
			$allowedjobs = $membershipsInfo->num_of_jobs_posting;
			$alreadyCreatedJobs = EmployerJobpostings::find()->where("userid = $userId AND createdDate >= '$packageInfoByUser->createdDate' ")->count();
			//echo $alreadyCreatedJobs;exit();
			if($alreadyCreatedJobs >=  $allowedjobs)
			{
				Yii::$app->getSession()->setFlash('success', [
						'type' => 'warning',
						'duration' => 20000,
						'icon' => 'fa fa-users',
						'message' => 'You are Max job postins are completed.',
						'title' => 'Success',
						'positonY' => 'top',
						'positonX' => 'center'
				]);
				return $this->redirect('employers-all-jobs');
			}
		}
		else {
			$allowedjobs = 10;
			$alreadyCreatedJobs = EmployerJobpostings::find()->where("userid = $userId ")->count();
			//echo $alreadyCreatedJobs;exit();
			if($alreadyCreatedJobs >=  $allowedjobs)
			{
				Yii::$app->getSession()->setFlash('success', [
						'type' => 'warning',
						'duration' => 20000,
						'icon' => 'fa fa-users',
						'message' => 'You are Max job postins are completed.',
						'title' => 'Success',
						'positonY' => 'top',
						'positonX' => 'center'
				]);
				return $this->redirect('employers-all-jobs');
			}
		}
		$this->layout = '@app/views/layouts/employerinner';
		
		
		if (($model->load ( Yii::$app->request->post () )) && $model->validate ()) {
			
			$model->image = UploadedFile::getInstance ( $model, 'image' );
			if(!(empty($model->image)))
			{
			
				$imageName = time().$model->image->name;
			
				$model->image->saveAs('profileimages/'.$imageName );
			
			
				$model->image = 'profileimages/'.$imageName;
			
				$image = '/frontend/web/profileimages/'.$imageName;
				$model->image = $image;
			}else{
				$model->image = '';
				
			}
			
	
			
			$skill = $model->skills;
			
			if (! Empty ( $skill )) {
				
				$array = $model->skills;
				$aryconvertskill1 = implode ( ",", $array );
				$comma_separated = rtrim($aryconvertskill1,",");
			
			}
			
			
			$location = $model->job_location;
			
			
			//$model->image = $employermodel->image;
			$model->createdDate = date('Y-m-d H:i:s');
			$model->updatedDate = date('Y-m-d H:i:s');
			$model->status = 'active';
			//$model->skills = $comma_separated;
			
			$model->userid = Yii::$app->employer->employerid;
			$model->country = Countries::getCountryName($model->country);
		//	$model->state = States::getStateName($model->state);
		//	$model->city = Cities::getCityName($model->city);
			$model->state = '';
			$model->city = '';
			$model->save ();
			
			if(!empty($skill))
			{
				for($n=0;$n < count($skill);$n++)
				{
					if($skill[$n] != '')
					{
					$jobSkills = new JobSkills();
					$jobSkills->jobid = $model->id;
					$jobSkills->skill_name = $skill[$n] ;
					$jobSkills->save();
					}
				}
			}
			
			if (! empty ( $model->job_location )) {
				$locationsnew = $model->job_location;
				for($k=0;$k < count($locationsnew); $k++)
				{
					if($locationsnew[$k] != '')
					{
						$jobLocations = new JobLocations();
						$jobLocations->jobid = $model->id;
						$jobLocations->location = $skill[$k] ;
						$jobLocations->save();
					}
				}
			}
			
			
			Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 20000,
					'icon' => 'fa fa-users',
					'message' => 'You are Successfully posted job.',
					'title' => 'Success',
					'positonY' => 'top',
					'positonX' => 'center'
			]);
			return $this->redirect('employers-all-jobs');
			
		} else {
			
			return $this->render ( 'jobpostings', [ 
					'model' => $model 
			] );
		}
	}

	public function actionJobpostingsview($id) {
		$this->layout = '@app/views/layouts/employerinner';
		$postings = $this->findModel ( $id );
		return $this->render ( 'jobpostingsview', [ 
				'postings' => $postings 
		]
		 );
	}
	public function actionView($id){
		$this->layout = '@app/views/layouts/employerinner';
		$model = $this->findModel ( $id );
		//print_r($model);exit;
		return $this->render ( 'postingview', [ 
				'model' => $model 
		] );
	}
	public function actionDelete($id) {
		$this->layout = '@app/views/layouts/employerinner';
		$this->findModel ( $id )->delete ();
		
		Yii::$app->getSession()->setFlash('success', [
				'type' => 'success',
				'duration' => 20000,
				'icon' => 'fa fa-users',
				'message' => 'successfully  Delete jobposting.',
				'title' => 'Success',
				'positonY' => 'top',
				'positonX' => 'center'
		]);
		return Yii::$app->getResponse ()->redirect ( [ 
				'employers-all-jobs' 
		] );
	}
	public function actionUpdate($id) {
		$this->layout = '@app/views/layouts/employerinner';
		$model = $this->findModel ( $id );
		$data=$model->job_location;
		$model->countriesList = Countries::getCountries();
		$model->country = Countries::getCountryId($model->country);
		
		
		
			
			$model->skills = $model->skills;
			$data=$model->skills;
				
				
			if (! Empty ( $data )) {
				$array = $model->skills;
			
				$array_skills = explode( ",",$array );
					
				$allsary = array();
				$valuary = array();
				foreach ($array_skills as $skillnew)
				{
					$allsary[$skillnew] = $skillnew;
					$valuary[] = $skillnew;
			
				}
				$model->allskills = $allsary;
				$model->skills = $valuary;
			
			
			}
			$model->imagenew = $model->image;
          
			
		if (! Empty ( $data )) {
			$array = $model->job_location;
		
				
			$array_locations = explode( ",",$array );
				
				
			$allsary = array();
			$valuary = array();
			foreach ($array_locations as $locationnew)
			{
				$allsary[$locationnew] = $locationnew;
				$valuary[] = $locationnew;
		
			}
			$model->alllocations = $allsary;
			$model->job_location = $valuary;
		
		}
		
		if (($model->load ( Yii::$app->request->post () )) && $model->validate ()) {
			
			
			$model->image = UploadedFile::getInstance ( $model, 'image' );
			if(!(empty($model->image)))
			{
					
				$imageName = time().$model->image->name;
					
				$model->image->saveAs('profileimages/'.$imageName );
					
					
				$model->image = 'profileimages/'.$imageName;
					
				$image = '/frontend/web/profileimages/'.$imageName;
				$model->image = $image;
			}
			else {
				$model->image = $model->imagenew;
			}
			
		
				
			$model->country = Countries::getCountryName($model->country);
			
			
			$skill = $model->skills;
				
			if (! Empty ( $skill )) {
			
				$array = $model->skills;
				$aryconvertskill1 = implode ( ",", $array );
				$comma_separated = rtrim($aryconvertskill1,",");
					
			}
			//print_r($model);exit();
			//$model->skills = $comma_separated;
			$model->save ();
			JobSkills::deleteAll( ['jobid' => $model->id]);
			
			if(!empty($skill))
			{
				for($n=0;$n < count($skill);$n++)
				{
					if($skill[$n] != '')
					{
						$jobSkills = new JobSkills();
						$jobSkills->jobid = $model->id;
						$jobSkills->skill_name = $skill[$n] ;
						$jobSkills->save();
					}
				}
			}
			JobLocations::deleteAll( ['jobid' => $model->id]);
			if (! empty ( $model->job_location )) {
				$locationsnew = $model->job_location;
				for($k=0;$k < count($locationsnew); $k++)
				{
					if($locationsnew[$k] != '')
					{
						$jobLocations = new JobLocations();
						$jobLocations->jobid = $model->id;
						$jobLocations->location = $skill[$k] ;
						$jobLocations->save();
					}
				}
			}
			
		
			Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 20000,
					'icon' => 'fa fa-users',
					'message' => 'successfully  Update jobposting.',
					'title' => 'Success',
					'positonY' => 'top',
					'positonX' => 'center'
			]);
			return Yii::$app->getResponse ()->redirect ( [ 
					'employers-job-details-'.$model->id
			] );
		} else {
			
			return $this->render ( 'jobpostingupdates', [ 
					'model' => $model
					
			] );
		}
	}
	
	
public function actionJobpostingslist() {
		$this->layout = '@app/views/layouts/employerinner';
		$query = EmployerJobpostings::find()->where(['userid' => Yii::$app->employer->employerid]);
		$searchModel = new JobpostSearch();
		$searchParams = Yii::$app->request->queryParams;
		$searchParams['userid'] = Yii::$app->employer->employerid;
		$dataProvider = $searchModel->search($searchParams);
		$id=Yii::$app->employer->employerid;
	
	

		$applied_data = EmployerJobpostings::find()->where(['userid' => Yii::$app->employer->employerid])->all();
		$total_postings=count($applied_data);
		
		

		
	
	 			$skillsdata = EmployerJobpostings::find()
 				->select('skill_name')->joinWith('jobnew', true, 'INNER JOIN')
				->where(['userid' => Yii::$app->employer->employerid])->all();
 				
				$skillsInfo = array();
 				if(!empty($skillsdata))
 				{
 					foreach ($skillsdata as $skillnew)
 					{
 						//echo rtrim($skillnew->skills,",");
 						$aryconvertskill = explode(",",rtrim($skillnew['jobnew']['skill_name'],","));
 						for($k=0; $k < count($aryconvertskill); $k++)
 						{
 							$skillsInfo[$aryconvertskill[$k]] = $aryconvertskill[$k];
 						}
 					}
 				}else {
 					$skillsInfo =[''];
 				}
 	
 				$MinExperienceinfo =  ArrayHelper::map(EmployerJobpostings::find()->where(['userid' => Yii::$app->employer->employerid])->all(), 'Min_Experience','Min_Experience');
 				
 				if($MinExperienceinfo)
 				{
 					$MinExperienceinfo;
 				}
 				else {
 					$MinExperienceinfo =[''];}
 				$designationinfo =  ArrayHelper::map(EmployerJobpostings::find()->where(['userid' => Yii::$app->employer->employerid])->all(), 'designation','designation');
 				
 				if($designationinfo)
 				{
 					$designationinfo; 
 				}
 				else {
 					$designationinfo = [''];}
 				$companynameinfo =  ArrayHelper::map(EmployerJobpostings::find()->where(['userid' => Yii::$app->employer->employerid])->all(), 'company_name','company_name');
 				
 				if($companynameinfo)
 				{
 					$companynameinfo;
 				}
 				else {$companynameinfo = [''];}
 				
 				$dataProvider = new ActiveDataProvider([
 						'pagination' => ['pageSize' =>5],
 						'query' => $query,
 				]);
 		
		return $this->render('jobgrid', 
				[
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
				'skillsInfo' => $skillsInfo,
				'MinExperienceinfo' => $MinExperienceinfo,
				'designationinfo' => $designationinfo,
				'companynameinfo' => $companynameinfo,
						'total_postings'=>$total_postings
				
					
				
				
				
		]);
	}
	public function actionEmployeeslist($jid) {
	
		$this->layout = '@app/views/layouts/employerinner';
		$model = new EmployeeJobapplied();
		if(isset($_GET['status']) && ($_GET['status'] != ''))
		{
			$newstatus = $_GET['status'];
			if($newstatus == 'All')
			{
				$query = EmployeeJobapplied::find()->where("jobid = $jid AND 	application_status != 'Deleted' ");
			}
			else {
			$query = EmployeeJobapplied::find()->where("jobid = $jid AND 	application_status != 'Deleted' AND application_status = '$newstatus'");
			}
		}
		else{
		$query = EmployeeJobapplied::find()->where("jobid = $jid AND 	application_status != 'Deleted' ");
		}
	
 	    $employeeResume = EmployeeResume::find()->where(['userid' => Yii::$app->employer->employerid])->select('resume')->one();
 	    $applied_data = EmployeeJobapplied::find()->where(['jobid' => $jid])->all();
 	 	$total_list=count($applied_data);
	
	
		
		$dataProvider = new ActiveDataProvider([
				'pagination' => ['pageSize' =>5],
				'query' => $query,
		]);

		//print_r($dataProvider->getModels());exit();
		return $this->render('jobappliedlist',
				['dataProvider' => $dataProvider,
						'employeeResume' =>$employeeResume,
						'total_list' =>$total_list
				]);
	}
	
	public function actionReport() {
		header('Content-Type: application/msword');
		// get your HTML raw content without any layouts or scripts
		$contentold = file_get_contents('http://localhost:8010/jobportal/frontend/web/uploadresume/brahmeswararao_php_3years.doc');
	//print_r($content);exit();
	$pdf = Yii::$app->pdf; // or new Pdf();
	$mpdf = $pdf->api; // fetches mpdf api
	 // call methods or set any properties
	$content = $mpdf->WriteHtml($contentold); // call mpdf write html
		// setup kartik\mpdf\Pdf component
		
		$pdf = new Pdf([
				// set to use core fonts only
				'mode' => Pdf::MODE_UTF8,
				// A4 paper format
				'format' => Pdf::FORMAT_A4,
				// portrait orientation
				'orientation' => Pdf::ORIENT_PORTRAIT,
				// stream to browser inline
				'destination' => Pdf::DEST_BROWSER,
				// your html content input
				'content' => $content,
				// format content from your own css file if needed or use the
				// enhanced bootstrap css built by Krajee for mPDF formatting
				'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
				// any css to be embedded if required
				'cssInline' => '.kv-heading-1{font-size:18px}',
				// set mPDF properties on the fly
				'options' => ['title' => 'Krajee Report Title'],
				// call mPDF methods on the fly
				'methods' => [
						'SetHeader'=>['Krajee Report Header'],
						'SetFooter'=>['{PAGENO}'],
				]
		]);
	
		// return the pdf output as per the destination setting
		return $pdf->render();
	}
	
	public function actionReportnew() {
		// get your HTML raw content without any layouts or scripts
		
		header('Content-disposition: inline');
header('Content-type: application/msword'); // not sure if this is the correct MIME type
@readfile('http://localhost:8010/jobportal/frontend/web/uploadresume/brahmeswararao_php_3years.doc');
exit;
	}
	public function actionFacebook() {
		$this->layout = '@app/views/layouts/employerinner';
		return $this->render ( 'view', [ 
		] );
	}
	public function actionShare() {
		return $this->render ( 'shareexp', [ 
		] );
	}
	
	public function actionValidateFb()
	{
		$this->layout = '@app/views/layouts/employerinner';
		$social = Yii::$app->getModule('social');
		$fb = $social->getFb(); // gets facebook object based on module settings
		try {
			$helper = $fb->getRedirectLoginHelper();
			$accessToken = $helper->getAccessToken();
		} catch(\Facebook\Exceptions\FacebookSDKException $e) {
			// There was an error communicating with Graph
			return $this->render('validate-fb', [
					'out' => '<div class="alert alert-danger">' . $e->getMessage() . '</div>'
			]);
		}
		if (isset($accessToken)) { // you got a valid facebook authorization token
			$response = $fb->get('/me?fields=id,name,email', $accessToken);
			return $this->render('validate-fb', [
					'out' => '<legend>Facebook User Details</legend>' . '<pre>' . print_r($response->getGraphUser(), true) . '</pre>'
			]);
		} elseif ($helper->getError()) {
			// the user denied the request
			// You could log this data . . .
			return $this->render('validate-fb', [
					'out' => '<legend>Validation Log</legend><pre>' .
					'<b>Error:</b>' . print_r($helper->getError(), true) .
					'<b>Error Code:</b>' . print_r($helper->getErrorCode(), true) .
					'<b>Error Reason:</b>' . print_r($helper->getErrorReason(), true) .
					'<b>Error Description:</b>' . print_r($helper->getErrorDescription(), true) .
					'</pre>'
			]);
		}
		return $this->render('validate-fb', [
				'out' => '<div class="alert alert-warning"><h4>Oops! Nothing much to process here.</h4></div>'
		]);
	}
	

	
	public function actionJobapplictionstatuschange()
	{
		
	
			$result = array();
			$jobappliedid = $_GET['appliedid'];
			$applicationStatus = $_GET['applicationstaus'];
			$applicationRating = $_GET['applicationrating'];
			$updatestatus = $_GET['updatestatus'];
	
			$model = new EmployeeJobapplied();
			$jobdetails = EmployeeJobapplied::find()->where(['jobUid' => $jobappliedid])->one();
			if($updatestatus == 'notdelete')
			{
			$jobdetails->application_status = $applicationStatus;
			$jobdetails->rating = $applicationRating;
			$jobdetails->updatedDate = date('Y-m-d H:i:s');
			$jobdetails->updatedBy = Yii::$app->employer->employerid;
			$checkJobs = $jobdetails->update();
			}
			if($updatestatus == 'delete')
			{
				$jobdetails->application_status = 'Deleted';
				$jobdetails->rating = 0;
				$jobdetails->updatedDate = date('Y-m-d H:i:s');
				$jobdetails->updatedBy = Yii::$app->employer->employerid;
				$checkJobs = $jobdetails->update();
			}
	
			if($checkJobs = 1)
			{
				$result['status'] = 1;
				$result['message'] = 'success';
			}else{
	
				$result['status'] = 0;
				$result['message'] = 'Somthing Wrong';
			}
			return json_encode($result);
			
	}
	protected function findModel($id) {
		if (($model = EmployerJobpostings::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	public function actionStates()
	{
	
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			 
			if ($parents != null) {
				$country = $parents[0];
				$states = Countries::getStatesByCountry($country);
				/* $out = [
				 ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
				 ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
	
				 ]; */
				echo Json::encode(['output'=>$states, 'selected'=>0]);
				return;
				 
				 
			}
		}
		 
		echo Json::encode(['output'=>'', 'selected'=>'']);
		 
		 
	}
	
	public function actionCities()
	{
	
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
	
			if ($parents != null) {
				$state = $parents[0];
				$cities = Countries::getCitiesByState($state);
				/* $out = [
				 ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
				 ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
	
				 ]; */
				echo Json::encode(['output'=>$cities, 'selected'=>0]);
				return;
					
					
			}
		}
			
		echo Json::encode(['output'=>'', 'selected'=>'']);
			
			
	}
    public function actionBrowseresumes()
	{
    	
		$searchModel = new EmployeeJobsearch();
		$skillsdata = EmployerJobpostings::find()
		->select('skills')
		->all();
		
		$skillsInfonew = array();
		if(!empty($skillsdata))
		{
			foreach ($skillsdata as $skillnew)
			{
				//echo rtrim($skillnew->skills,",");
				$aryconvertskill = explode(",",rtrim($skillnew->skills,","));
				for($k=0; $k < count($aryconvertskill); $k++)
				{
					$skillsInfonew["$aryconvertskill[$k]"] = $aryconvertskill[$k];
				}
			}
		}
		else {
			$skillsInfonew =[''];
		}
		 
		$companydata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name');
		if($companydata)
		{
			$companydata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name');
		}
		else {
			$companydata = [''];
		}
		 
		 
		$desdata = ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name');
		if($desdata)
		{
			$desdata =  ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name');
		}
		else {
			$desdata = [''];
		}
		 
		 
		$expdata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience');
		if($expdata)
		{
			$expdata =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience');
		}
		else {
			$expdata =[''];
		}
		//print_r($expdata);exit();
		//print_r($_GET['EmployeeJobsearch']);exit();
		$skills= array();
		$isquerystirng = 0;
		if(isset($_GET['EmployeeJobsearch']['skills']) && $_GET['EmployeeJobsearch']['skills'] != '')
		{
			$isquerystirng = 1;
			$skills = $_GET['EmployeeJobsearch']['skills'];
			$searchModel->skills = $skills;
			if(isset($_GET['EmployeeJobsearch']['Min_Experience']) && $_GET['EmployeeJobsearch']['Min_Experience'] != '')
			{
				$experience = $_GET['EmployeeJobsearch']['Min_Experience'];
				$searchModel->Min_Experience = $experience;
				
				$skillsInfo = EmployeeSkills::find()->joinWith('user')->joinWith('usersignup')->joinWith('useremployeepreference')->where(['IN','skillname', $skills])->andWhere("experience >= $experience ");
			}
			else {
			     $skillsInfo = EmployeeSkills::find()->joinWith('user')->joinWith('usersignup')->joinWith('useremployeepreference')->where(['IN','skillname', $skills]);
			}
			
		}   
		if(isset($_GET['EmployeeJobsearch']['designation']) && $_GET['EmployeeJobsearch']['designation'] != '')
		{
			$isquerystirng = 1;
			$designation = $_GET['EmployeeJobsearch']['designation'];
			$searchModel->designation = $designation;
			$skillsInfo = EmployeeEmployer::find()->joinWith('user')->joinWith('usersignup')->joinWith('useremployeepreference')->where(['designation'=> $designation]);
		}
		if(isset($_GET['EmployeeJobsearch']['skills']) && $_GET['EmployeeJobsearch']['skills'] != '' && isset($_GET['EmployeeJobsearch']['designation']) && $_GET['EmployeeJobsearch']['designation'] != '')
		{
			
			$isquerystirng = 1;
			$skills = $_GET['EmployeeJobsearch']['skills'];
			$designation = $_GET['EmployeeJobsearch']['designation'];
			$searchModel->skills = $skills;
			$searchModel->designation = $designation;
			$skillsInfo = EmployeeSkills::find()->joinWith('user')->joinWith('usersignup')->joinWith('useremployee')->joinWith('useremployeepreference')->where(['IN','skillname', $skills])->andWhere(['designation'=> $designation]);
		}
		if($isquerystirng == 0)
		{
			$skills = [''];
			$skillsInfo = EmployeeSkills::find()->joinWith('user')->joinWith('usersignup')->joinWith('useremployeepreference')->where(['IN','skillname', $skills]);
				
		}
		$dataProvider = new ActiveDataProvider([
				'pagination' => ['pageSize' =>5],
				'query' => $skillsInfo,
		]);
		
		
		//print_r($skillsInfo);exit();
		
		$this->layout = '@app/views/layouts/employerinner';
		//echo "hai";exit;
		return $this->render('browseresumes',['dataProvider' => $dataProvider,'searchModel' => $searchModel,'skillsInfonew' => $skillsInfonew,
    			'companydata' => $companydata,
    			'desdata' => $desdata,
    			'expdata' => $expdata,]);
	
	}
	public function actionResumepage($id)
	{
		$model = new SignupForm();
		$this->layout = '@app/views/layouts/resumepage';
		$userdata = User::find()->joinWith('usersignup')->joinWith('education')->joinwith('employeeEmployer')->joinwith('useremployeepreference')->where(['id'=> $id] )->one();
		return $this->render('resumepage',['userdata'=>$userdata ]);
	
	}
	
	
	
}
