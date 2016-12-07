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

class EmpcommonController extends Controller
{

	public function actionEmployer()
	{
		$this->layout= '@app/views/layouts/employermain';
		$model = new EmployerForm ();
		$employerSignup = new EmployerSignup ();
		$employermodel = new Employer ();
		$companyModel = new EmployerCompany();
		$educationModel = new EmployerEducation();
		$skillsModel = new EmployerSkills();
		$employmentModel = new Employement();
		$preferencesModel = new EmployerPreferences();
		$userData = User::find ()->where ( [ 'id' => Yii::$app->user->id ] )->one ();
		$employeData = Employer :: find ()->where ( [ 'userid' => Yii::$app->user->id ] )->one ();
		//print_r( Yii::$app->user->id);exit;
		$companyData = EmployerCompany :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$educationData = EmployerEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$skillsData = EmployerSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$employmentData = Employement :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$preferencesData  = EmployerPreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		if(!(empty($employeData))){
		$model->name = $employeData->name;
		$model->designation = $employeData->designation;
		$model->gender = $employeData->gender;
		$model->dateofbirth = $employeData->dateofbirth;
		$model->mobilenumber = $employeData->mobilenumber;
		$model->address = $employeData->address;
		
		}
		if(!(empty($userData))){
		$model->username = $userData->username;
		$model->email = $userData->email;
		}

		if(!(empty($companyData))){
			$model->company_name = $companyData->company_name;
			$model->industry_type = $companyData->industry_type;
			$model->dateofestablishment = $companyData->dateofestablishment;
			$model->company_type = $companyData->company_type;
			$model->location = $companyData->location;
			$model->country = $companyData->country;
			$model->state = $companyData->state;
			$model->city = $companyData->city;
			$model->zipcode = $companyData->zipcode;
		}
		if(!(empty($educationData))){
				$model->higherdegree = $educationData->higherdegree;
		        $model->specialization = $educationData->specialization;
		        $model->university = $educationData->university;
		        $model->collegename = $educationData->collegename;
		        $model->passingyear = $educationData->passingyear;
		}
		if(!(empty($skillsData))){
			$model->requirment = $skillsData->requirment;
			$model->companytype = $skillsData->companytype;
			$model->jobtype = $skillsData->jobtype;
		}
		
		if(!(empty($employmentData))){
			$model->job_title = $employmentData->job_title;
			$model->job_type = $employmentData->job_type;
			$model->job_description = $employmentData->job_description;
			$model->experience = $employmentData->experience;
			$model->no_of_openings = $employmentData->no_of_openings;
			$model->work_location = $employmentData->work_location;
			$model->shift_timings = $employmentData->shift_timings;
			$model->weekly_days = $employmentData->weekly_days;
			$model->salary = $employmentData->salary;
		}
		if(!(empty($preferencesData))){
			$model->expected_salary = $preferencesData->expected_salary;
			$model->job_location = $preferencesData->job_location;
			$model->job_role = $preferencesData->job_role;
		
		}
		
	
		if (($model->load(Yii::$app->request->post())) && ($model->validate()) )
		{
			//print_r($model->load(Yii::$app->request->post()));exit;
			if(!(empty($employeData))){
				$employeData->name = $model->name;
				//print_r($employeData->name);exit;
				$employeData->designation = $model->designation;
				$employeData->gender = $model->gender;
				//$employeData = date('Y-m-d', strtotime($model->dateofbirth));
				$companyDataa = date('Y-m-d', strtotime($model->dateofbirth));
				$employeData->dateofbirth = $companyDataa;
				$employeData->mobilenumber = $model->mobilenumber;
				$employeData->address = $model->address;
				
				$employeData ->userid = Yii::$app->user->id ;
				$employeData-> save();
			}
			
			else
			{
			
				$employermodel->name = $model->name;
				//print_r($employeData->name);exit;
				$employermodel->designation = $model->designation;
				$employermodel->gender = $model->gender;
				//$employermodel = date('Y-m-d', strtotime($model->dateofbirth));
				$companyDataa = date('Y-m-d', strtotime($model->dateofbirth));
				$employermodel->dateofbirth = $companyDataa;
				$employermodel->mobilenumber = $model->mobilenumber;
				$employermodel->address = $model->address;
				$employermodel ->userid = Yii::$app->user->id ;
				$employermodel-> save();
			}


			if(!(empty($companyData))){
				
				$companyData->company_name = $model ->company_name;
				$companyDataa = date('Y-m-d', strtotime($model->dateofestablishment));
				$companyData->dateofestablishment = $companyDataa;
				$companyData->company_type = $model->company_type;
				$companyData->industry_type = $model->industry_type;
				$companyData->location = $model->location;
				$companyData->country = $model->country;
				$companyData->state = $model->state;
 				$companyData->city = $model->city;
            	$companyData->zipcode = $model->zipcode;
				//$companyData ->userid = Yii::$app->user->id ;
				$companyData-> save();
			}
	
			else
				{
	
				$companyModel->company_name = $model->company_name;
				$companyDataa = date('Y-m-d', strtotime($model->dateofestablishment));
				$companyModel->dateofestablishment = $companyDataa;
				$companyModel->company_type = $model->company_type;
				$companyModel->industry_type = $model->industry_type;
				$companyModel->location = $model->location;
				$companyModel->country = $model->country;
				$companyModel->state = $model->state;
				$companyModel->city = $model->city;
				$companyModel->zipcode = $model->zipcode;
				$companyModel->userid = Yii::$app->user->id ;
				$companyModel-> save();
				//print_r($companyModel->errors);exit;
				
				}
				if(!(empty($educationData))){
					$educationData->higherdegree = $model->higherdegree;
					$educationData->specialization = $model->specialization;
					$educationData->university = $model->university;
					$educationData->collegename = $model->collegename;
					$educationData->passingyear = $model->passingyear;
					$educationData-> save();
				}
				else {
					$educationModel->higherdegree = $model->higherdegree;
					$educationModel->specialization = $model->specialization;
					$educationModel->university = $model->university;
					$educationModel->collegename = $model->collegename;
					$educationModel->passingyear = $model->passingyear;
					$educationModel->userid = Yii::$app->user->id ;
					$educationModel-> save();
					
				}
				if(!(empty($skillsData))){
					$skillsData->requirment = $model->requirment;
					$skillsData->companytype = $model->companytype;
					$skillsData->jobtype = $model->jobtype;
					$skillsData-> save();
				}else {
					$skillsModel->requirment = $model->requirment;
					$skillsModel->companytype = $model->companytype;
					$skillsModel->jobtype = $model->jobtype;
					$skillsModel->userid = Yii::$app->user->id ;
					$skillsModel-> save();
					
				}
				if(!(empty($employmentData))){
					$employmentData->job_title = $model->job_title;
					$employmentData->job_type = $model->job_type;
					$employmentData->job_description = $model->job_description;
					$employmentData->experience = $model->experience;
					$employmentData->no_of_openings = $model->no_of_openings;
					$employmentData->work_location = $model->work_location;
					$employmentData->shift_timings = $model->shift_timings;
					$employmentData->weekly_days = $model->weekly_days;
					$employmentData->salary = $model->salary;
					$employmentData-> save();
				}else {
					$employmentModel->job_title = $model->job_title;
				    //print_r($model->job_title);exit;
					$employmentModel->job_type = $model->job_type;
					//print_r($model->job_type);exit;
					$employmentModel->job_description = $model->job_description;
			     	$employmentModel->experience = $model->experience;
					$employmentModel->no_of_openings = $model->no_of_openings;
					$employmentModel->work_location = $model->work_location;
					$employmentModel->shift_timings = $model->shift_timings;
					$employmentModel->weekly_days = $model->weekly_days;
					$employmentModel->salary = $model->salary;
					$employmentModel->userid = Yii::$app->user->id ;
					$employmentModel-> save();
					//print_r($employmentModel->errors);exit;
					//print_r($employmentModel);exit;
					
				}
				if(!(empty($preferencesData))){
					$preferencesData->expected_salary = $model->expected_salary;
					$preferencesData->job_location = $model->job_location;
					$preferencesData->job_role = $model->job_role;
					$preferencesData-> save();
				
				} else {
					$preferencesModel->expected_salary = $model->expected_salary;
					$preferencesModel->job_location = $model->job_location;
					$preferencesModel->job_role = $model->job_role;
					$preferencesModel->userid = Yii::$app->user->id ;
					$preferencesModel-> save();
					
				}
				Yii::$app->getSession()->setFlash('success', ' successfully  updated');
				//return $this->goBack();
				//return $this->redirect ( '/employercompany/empcommon/employer');
				return Yii::$app->getResponse()->redirect(['employercompany/empcommon/employercommonview', 'userid' => Yii::$app->user->id ] );
			
		
		}
		
		return $this->render('comview', [
				'model' => $model,
				
		]);
		
	}
	public function actionEmployercommonview()
	{
		$this->layout= '@app/views/layouts/employermain';
		$model = new EmployerForm ();
		$model = User::find ()->where ( [ 'id' => Yii::$app->user->id ] )->one ();
		$employemodel = Employer :: find ()->where ( [ 'userid' => Yii::$app->user->id ] )->one ();
		$jobmodel = EmployerCompany :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$edumodel = EmployerEducation :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		//print_r($model);exit;
	    $skillsmodel = EmployerSkills :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$employmentmodel = Employement :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		$preferencesmodel  = EmployerPreferences :: find ()->Where (['userid' => Yii::$app->user->id])->one();
		
		return $this->render('employercommonview',['preferencesmodel'=>$preferencesmodel,'employmentmodel'=>$employmentmodel, 'skillsmodel'=>$skillsmodel,'employemodel' => $employemodel,'jobmodel'=>$jobmodel,'edumodel'=>$edumodel,'model' => $model]);

		
	}
	public function actionCreate()
	{
		$this->layout= '@app/views/layouts/employermain';
	   $model = new EmployerJobpostings();
	//   $postings = EmployerJobpostings :: find()->all();
	
	   if (($model->load(Yii::$app->request->post())) && $model->validate() )
	   {
	  
	  // 	$postings = EmployerJobpostings :: find()->one();
	   	
	   
 	   	$skill = $model->skills;
 	  
 	   		if(!Empty($skill)){
 	   			
 	   		$array=$model->skills;
 	   		
 	   		$comma_separated = implode(",", $array);

 	   	   	}

        $model->skills=$comma_separated;
 	 	 
 	    $model->save();
 	   
	   Yii::$app->getSession()->setFlash('success', ' successfully  create jobposting');
	   return Yii::$app->getResponse()->redirect(['employercompany/empcommon/jobpostingslist'] );
	  	   }
	  	   else {
	  	   	return $this->render('jobpostings', [
	  	   		'model' => $model,
	  	   ]);
	  	   }
	  	   return $this->render('jobpostings', [
	  	   		'model' => $model,
	  	   ]);
	}
	
	public function actionJobpostingslist()
	{
		$this->layout= '@app/views/layouts/employerinner';
		$searchModel = new JobpostSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	
		return $this->render('jobgrid', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
		]);
	}
	public function actionJobpostingsview($id)
	{
		$this->layout= '@app/views/layouts/employermain';
		$postings = $this->findModel($id);
		return $this->render('jobpostingsview',['postings'=>$postings,
	
		]);
	}
		public function actionView($id)
		{
			$this->layout= '@app/views/layouts/employermain';
			$model = $this->findModel($id);
			return $this->render('postingview', [
					'model' => $model,
			]);
		}
		public function actionDelete($id)
		{
			$this->layout= '@app/views/layouts/employermain';
			$this->findModel($id)->delete();
			Yii::$app->getSession()->setFlash('success', ' successfully  Delete jobposting');
			return Yii::$app->getResponse()->redirect(['employercompany/empcommon/jobpostingslist']);
		}
		public function actionUpdate($id)
		{
			$this->layout= '@app/views/layouts/employermain';
			$model = $this->findModel($id);
			$postings = EmployerJobpostings :: find()->one();
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				
				Yii::$app->getSession()->setFlash('success', ' successfully  Update jobposting');
				return Yii::$app->getResponse()->redirect(['employercompany/empcommon/jobpostingsview', 'id' => $model->id]);
			} else {
				return $this->render('jobpostingupdates', [
						'model' => $model,
						'postings'=>$postings,
				]);
			}
		}
		
// 	public function actionJobpostingsupdate($id)
// 	{
// 		$model = $this->findModel($id);
		
// 		//$model = new EmployerJobpostings();
// 		$postings = EmployerJobpostings :: find()->one($id);
// 		if (($model->load(Yii::$app->request->post())) && ($model->validate()) )
// 		{
// 			$postingsdata = EmployerJobpostings :: find()->one();
// 			$postingsdata ['company_name'] = $model->company_name;
// 			$postingsdata ['company_type'] = $model->company_type;
// 			$postingsdata ['industry_type'] = $model->industry_type;
// 			$postingsdata ['dateofestablishment'] = $model->dateofestablishment;
// 			$postingsdata ['country'] = $model->country;
// 			$postingsdata ['state'] = $model->state;
// 			$postingsdata ['city'] = $model->city;
// 			$postingsdata ['zipcode'] = $model->zipcode;
// 			$postingsdata ['skills'] = $model->skills;
// 			$postingsdata ['desigmation'] = $model->desigmation;
// 			$postingsdata ['experience'] = $model->experience;
// 			$postingsdata ['rolecategory'] = $model->rolecategory;
// 			$postingsdata ['Description'] = $model->Description;
// 			$postingsdata ['jobtype'] = $model->jobtype;
// 			$postingsdata ['gender'] = $model->gender;
// 			$postingsdata ['address'] = $model->address;
// 			$postingsdata->update($postingsdata);
			
// 			$model->save();
// 			return Yii::$app->getResponse()->redirect(['employercompany/empcommon/jobpostingsview'] );
// 		}return $this->render('jobpostingupdates',['postings'=>$postings,
// 				'model' => $model,
// 		]);
// 	}
  protected function findModel($id)
    {
        if (($model = EmployerJobpostings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}