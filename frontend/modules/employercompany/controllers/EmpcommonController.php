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
								'delete' => ['DELETE'],
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
													
												$this->redirect(Yii::$app->urlManager->createUrl(['employercompany/empsite/login/']));
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
			$model->name = $employeData->name;
			$model->designation = $employeData->designation;
			$model->gender = $employeData->gender;
			$model->dateofbirth = $employeData->dateofbirth;
			$model->mobilenumber = $employeData->mobilenumber;
			$model->address = $employeData->address;
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
		$this->layout = '@app/views/layouts/employerinner';
		$model = new EmployerJobpostings ();
		
		if (($model->load ( Yii::$app->request->post () )) && $model->validate ()) {
			
	
			
			$skill = $model->skills;
			
			if (! Empty ( $skill )) {
				
				$array = $model->skills;
				$aryconvertskill1 = implode ( ",", $array );
				$comma_separated = rtrim($aryconvertskill1,",");
			
			}
			
			$model->startDate = date ( "Y-m-d " );
			$model->status = 1;
			$model->skills = $comma_separated;
			$model->userid = Yii::$app->employer->employerid;
			
			$model->save ();
			
			Yii::$app->getSession ()->setFlash ( 'success', ' successfully  create jobposting' );
			return Yii::$app->getResponse ()->redirect ( [ 
					'employercompany/empcommon/jobpostingslist' 
					
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
		$query = EmployeeJobapplied::find()->where("jobid = $jid AND 	application_status != 'Deleted' ");
	
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
	
	
	
}
