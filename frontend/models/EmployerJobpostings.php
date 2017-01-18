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
								'currency'
						],
						'required' 
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
								'min_salary'
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
				'Min_Experience' => 'Min Experience',
				'Max_Experience' => 'Max Experience',
				'Description' => 'Description',
				'jobtype' => 'Jobtype',
				'job_location' =>'Job Location',
				'status'=>'Status',
				'image'=>'Image',
				
				'roleid' => 'Roleid',
				'CTC' => 'CTC',
				'rolecategory' => 'Rolecategory',
				'company_name' => 'Company name',
				'company_type' => 'Company type',
				'industry_type' => 'Industry type',
				'dateofestablishment' => 'Date Of Establishment',
				'country' => 'Country',
				'state' => 'State',
				'city' => 'City',
				
				'userid' =>'userid'
		];
	}
	
	public function getJobnew()
	{
		return $this->hasOne(JobSkills::className(), ['jobid' => 'id']);
	}
	
}
