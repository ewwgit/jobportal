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
								
								
								'address',
								'company_name',
								'company_type',
								'industry_type',
								'dateofestablishment',
 								'country',
// 								'state',
// 								'city',
								'zipcode',
								'Min_Experience',
								'Max_Experience' ,
								'job_location',
								'status'
						],
						'required' 
				],
				[
						['zipcode',],'integer'
				],
				[ 
						[ 
								'CTC',
								'rolecategory',
								'skills',
								'designation',
								
								'Description',
								'jobtype',
								
								'address',
								'company_name',
								'company_type',
								'industry_type',
								'dateofestablishment',
								'country',
// 								'state',
// 								'city',
								'zipcode',
								'Min_Experience',
								'Max_Experience' ,
								'userid',
								'job_location',
								'status',
								'image'
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
			
				'address' => 'Address',
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
				'zipcode' => 'Zipcode',
				'userid' =>'userid'
		];
	}
	
}
