<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class EmployerJobpostings extends \yii\db\ActiveRecord {
	
	public $alllocations;
	public $countriesList;
	public $statesData;
	public $allskills;
	public $imagenew;
	public $skills;
	public $job_location;
	
	public static function tableName() {
		return 'employer_post_jobs';
	}
	
	
	public function rules() {
		return [ 
				[ 
						[ 
								'CTC',
								'rolecategory',
								'skills',
								'designation',
								'Description',
								'jobtype',
								
								
								
								'company_name',
								'company_type',
								'industry_type',
								'dateofestablishment',
 								'country',
// 								'state',
// 								'city',
								
								'Min_Experience',
								'Max_Experience' ,
								'job_location',
								'status',
								'sal_type',
								'currency',
							
								'job_title'
								
						],
						'required' 
				],
				[
				'email',
				'trim'
						],
						[
								'email',
								'required'
						],
						[
								'email',
								'email'
						],
						[
								'email',
								'string',
								'max' => 255
						],
						[
								'email',
								'unique',
								'targetClass' => '\common\models\User',
								'message' => 'This email address has already been taken.'
						],
				
				[ 
						[ 
								'CTC',
								'rolecategory',
								'skills',
								'designation',
								
								'Description',
								'jobtype',
								
								
								'company_name',
								'company_type',
								'industry_type',
								'dateofestablishment',
								'country',
                               // 'state',
                              // 'city',
								
								'Min_Experience',
								'Max_Experience' ,
								'userid',
								'job_location',
								'status',
								'image',
								'company_profile',
								'min_salary',
								'website',
								'email',
								'job_title'
						],
						'safe' 
				] 
		];
	}
	public function attributeLabels() {
		return [ 
				'id' => 'id',
				'skills' => 'Skills',
				'designation' => 'Designation',
				'Min_Experience' => 'MinExperience',
				'Max_Experience' => 'MaxExperience',
				'Description' => 'Description',
				'jobtype' => 'Jobtype',
				'job_location' =>'Job Location',
				'status'=>'Status',
				'image'=>'Image',
				
				'roleid' => 'Roleid',
				'CTC' => 'Max Sal',
				'rolecategory' => 'Rolecategory',
				'company_name' => 'Company name',
				'company_type' => 'Company type',
				'industry_type' => 'Industry type',
				'dateofestablishment' => 'Date Of Establishment',
				'country' => 'Country',
				'state' => 'State',
				'city' => 'City',
				'website' =>'Website',
				'email' =>'email',
				'job_title' =>'Job Title',
				
				'userid' =>'userid'
		];
	}
	
	public function getJobnew()
	{
		return $this->hasOne(JobSkills::className(), ['jobid' => 'id']);
	}
	public function getJoblocation()
	{
		return $this->hasOne(JobLocations::className(), ['jobid' => 'id']);
	}
	
}
