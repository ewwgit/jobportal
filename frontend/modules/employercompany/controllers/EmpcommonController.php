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
use frontend\models\EmployerForm;
use frontend\models\EmployerJobpostings;
use frontend\models\JobpostSearch;

use frontend\models\EmployeeJobapplied;
use yii\data\ActiveDataProvider;
use yii\db\Query ;
use yii\helpers\ArrayHelper;


class EmpcommonController extends Controller {
	public function actionEmployer() {
		$this->layout = '@app/views/layouts/employerinner';
		$model = new EmployerForm ();
		$employerSignup = new EmployerSignup ();
		$employermodel = new Employer ();
		$companyModel = new EmployerCompany ();
		$educationModel = new EmployerEducation ();
		//$skillsModel = new EmployerSkills ();
		$employmentModel = new Employement ();
		$preferencesModel = new EmployerPreferences ();
		$userData = User::find ()->where ( [ 
				'id' => Yii::$app->employer->employerid 
		] )->one ();
		$employeData = Employer::find ()->where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		// print_r( Yii::$app->employer->employerid);exit;
		$companyData = EmployerCompany::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$educationData = EmployerEducation::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
// 		$skillsData = EmployerSkills::find ()->Where ( [ 
// 				'userid' => Yii::$app->employer->employerid 
// 		] )->one ();
		$employmentData = Employement::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$preferencesData = EmployerPreferences::find ()->Where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		
		if (! (empty ( $employeData ))) {
			$model->name = $employeData->name;
			$model->designation = $employeData->designation;
			$model->gender = $employeData->gender;
			$model->dateofbirth = $employeData->dateofbirth;
			$model->mobilenumber = $employeData->mobilenumber;
			$model->address = $employeData->address;
			$model->profileimagenew = $employeData->profileimage;
			$model->skills = $employeData->skills;
			$data=$model->skills;
			//print_r($model->skills);exit;
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
		
		if (! (empty ( $companyData ))) {
			$model->company_name = $companyData->company_name;
			$model->industry_type = $companyData->industry_type;
			$model->dateofestablishment = $companyData->dateofestablishment;
			$model->employer_type = $companyData->employer_type;
			$model->location = $companyData->location;
			$model->country = $companyData->country;
			$model->state = $companyData->state;
			$model->city = $companyData->city;
			$model->zipcode = $companyData->zipcode;
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
 			//print_r($model->skills);exit;
 	 		}
		
		if (! (empty ( $employmentData ))) {
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
                   //print_r($skill);exit;
	
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
				//print_r($model->skills);exit;
			     $employermodel = $model->skills;
				//print_r($skill);exit;
					
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
				//print_r($employermodel);exit;
			}
			
			
			if (! (empty ( $companyData ))) {
				
				$companyData->company_name = $model->company_name;
			
				$companyDataa = date ( 'Y-m-d', strtotime ( $model->dateofestablishment ) );
				$companyData->dateofestablishment = $companyDataa;
				$companyData->employer_type = $model->employer_type;
				$companyData->industry_type = $model->industry_type;
				$companyData->location = $model->location;
				$companyData->country = $model->country;
				$companyData->state = $model->state;
				$companyData->city = $model->city;
				$companyData->zipcode = $model->zipcode;

				$companyData->save ();
			} 
			

			else {
				
				$companyModel->company_name = $model->company_name;
				
				$companyDataa = date ( 'Y-m-d', strtotime ( $model->dateofestablishment ) );
				$companyModel->dateofestablishment = $companyDataa;
				
				$companyModel->employer_type = $model->employer_type;
			
				$companyModel->industry_type = $model->industry_type;
				$companyModel->location = $model->location;
				$companyModel->country = $model->country;
				$companyModel->state = $model->state;
				$companyModel->city = $model->city;
				$companyModel->zipcode = $model->zipcode;
				$companyModel->userid = Yii::$app->employer->employerid;
			
				$companyModel->save ();
			
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
				$employmentData->job_title = $model->job_title;
				$employmentData->job_type = $model->job_type;
				$employmentData->job_description = $model->job_description;
				$employmentData->experience = $model->experience;
				$employmentData->work_location = $model->work_location;
				$employmentData->shift_timings = $model->shift_timings;
				$employmentData->weekly_days = $model->weekly_days;
				$employmentData->salary = $model->salary;
				$employmentData->save ();
			} else {
				$employmentModel->job_title = $model->job_title;
				$employmentModel->job_type = $model->job_type;
				$employmentModel->job_description = $model->job_description;
				$employmentModel->experience = $model->experience;
				$employmentModel->work_location = $model->work_location;
				$employmentModel->shift_timings = $model->shift_timings;
				$employmentModel->weekly_days = $model->weekly_days;
				$employmentModel->salary = $model->salary;
				$employmentModel->userid = Yii::$app->employer->employerid;
				$employmentModel->save ();
				//print_r($employmentModel);exit;
			
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
			Yii::$app->getSession ()->setFlash ( 'success', ' successfully  updated' );
		
 			return Yii::$app->getResponse ()->redirect ( [ 
 					'employercompany/empcommon/employercommonview',
 					'userid' => Yii::$app->employer->employerid 
 			] );
		}
		
		return $this->render ( 'comview', [ 
				'model' => $model 
		]
		 );
	}
	public function actionEmployercommonview() {
		$this->layout = '@app/views/layouts/employermain';
		$model = new EmployerForm ();
		$model = User::find ()->where ( [ 
				'id' => Yii::$app->employer->employerid 
		] )->one ();
		$employemodel = Employer::find ()->where ( [ 
				'userid' => Yii::$app->employer->employerid 
		] )->one ();
		$jobmodel = EmployerCompany::find ()->Where ( [ 
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
				'jobmodel' => $jobmodel,
				'edumodel' => $edumodel,
				'model' => $model 
		] );
	}
	public function actionCreate($userid) {
		$this->layout = '@app/views/layouts/employerinner';
		$model = new EmployerJobpostings ();
		$query = EmployerJobpostings::find()->where(['userid' => $userid]);
		$userid=Yii::$app->employer->employerid;
	
		
		if (($model->load ( Yii::$app->request->post () )) && $model->validate ()) {
			
	
			
			$skill = $model->skills;
			
			if (! Empty ( $skill )) {
				
				$array = $model->skills;
				
				$comma_separated = implode ( ",", $array );
			}
			
			$model->startDate = date ( "Y-m-d H:i:s" );
			
			$model->skills = $comma_separated;
			$model->userid = $userid;
			
			$model->save ();
			
			Yii::$app->getSession ()->setFlash ( 'success', ' successfully  create jobposting' );
			return Yii::$app->getResponse ()->redirect ( [ 
					'employercompany/empcommon/jobpostingslist' ,
					'userid' => Yii::$app->employer->employerid 
			] );
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
	public function actionView($id) {
		$this->layout = '@app/views/layouts/employerinner';
		$model = $this->findModel ( $id );
		return $this->render ( 'postingview', [ 
				'model' => $model 
		] );
	}
	public function actionDelete($id) {
		$this->layout = '@app/views/layouts/employerinner';
		$this->findModel ( $id )->delete ();
		Yii::$app->getSession ()->setFlash ( 'success', ' successfully  Delete jobposting' );
		return Yii::$app->getResponse ()->redirect ( [ 
				'employercompany/empcommon/jobpostingslist' 
		] );
	}
	public function actionUpdate($id) {
		$this->layout = '@app/views/layouts/employerinner';
		$model = $this->findModel ( $id );
		$postings = EmployerJobpostings::find ()->one ();
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			
			Yii::$app->getSession ()->setFlash ( 'success', ' successfully  Update jobposting' );
			return Yii::$app->getResponse ()->redirect ( [ 
					'employercompany/empcommon/jobpostingsview',
					'id' => $model->id 
			] );
		} else {
			return $this->render ( 'jobpostingupdates', [ 
					'model' => $model,
					'postings' => $postings 
			] );
		}
	}
	
	
public function actionJobpostingslist($userid) {
		$this->layout = '@app/views/layouts/employerinner';
		$query = EmployerJobpostings::find()->where(['userid' => $userid]);
		$searchModel = new JobpostSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$id=Yii::$app->employer->employerid;
		//print_r($id);exit;
		
	 			$skillsdata = EmployerJobpostings::find()
 				->select('skills')
				->where(['userid' => Yii::$app->employer->employerid])->all();
 				
				$skillsInfo = array();
 				if(!empty($skillsdata))
 				{
 					foreach ($skillsdata as $skillnew)
 					{
 						//echo rtrim($skillnew->skills,",");
 						$aryconvertskill = explode(",",rtrim($skillnew->skills,","));
 						for($k=0; $k < count($aryconvertskill); $k++)
 						{
 							$skillsInfo[$aryconvertskill[$k]] = $aryconvertskill[$k];
 						}
 					}
 				}else {
 					$skillsInfo =[''];
 				}
 	
 				$MinExperienceinfo =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience');
 				
 				if($MinExperienceinfo)
 				{
 					$MinExperienceinfo;
 				}
 				else {
 					$MinExperienceinfo =[''];}
 				$designationinfo =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'designation','designation');
 				
 				if($designationinfo)
 				{
 					$designationinfo; 
 				}
 				else {
 					$designationinfo = [''];}
 				$companynameinfo =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name');
 				
 				if($companynameinfo)
 				{
 					$companynameinfo;
 				}
 				else {$companynameinfo = [''];}
 		
		return $this->render('jobgrid', 
				[
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
				'skillsInfo' => $skillsInfo,
				'MinExperienceinfo' => $MinExperienceinfo,
				'designationinfo' => $designationinfo,
				'companynameinfo' => $companynameinfo,
				//'userid' => Yii::$app->employer->employerid ,
				
				
		]);
	}
	
	
	protected function findModel($id) {
		if (($model = EmployerJobpostings::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	public function actionEmployeeslist($jid) {
		
		$this->layout = '@app/views/layouts/employerinner';
		
		$query = EmployeeJobapplied::find()->where(['jobid' => $jid]);
		$dataProvider = new ActiveDataProvider([
				'pagination' => ['pageSize' =>5],
				'query' => $query,
		]);
	
		return $this->render('jobappliedlist',
				['dataProvider' => $dataProvider]);
		}	
	
}