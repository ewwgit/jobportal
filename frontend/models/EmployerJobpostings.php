<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class EmployerJobpostings extends \yii\db\ActiveRecord {
	public static function tableName() {
		return 'employer_post_jobs';
	}
	public $allskills;
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
								'state',
								'city',
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
								'state',
								'city',
								'zipcode',
								'Min_Experience',
								'Max_Experience' ,
								'userid',
								'job_location',
								'status'
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
	// public static skills($skills){
	// if($skills){
	// return ['skills'];
	// }else{
	// return [];
	// }
	// }
}
