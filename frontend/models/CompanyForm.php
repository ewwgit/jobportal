<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class CompanyForm Extends  \yii\db\ActiveRecord {

	public static function tableName(){
		
		return 'companies';
	}
	public function rules()
	{
		return[
				[
						[
						        'company_name',
						        'description',
					        	'establishment_date',
						        'category',
						        'industry',
								'email',
								'phone_no',
								'mobile_no',
								'add_branches'
								
				        ] ,
				        'required'
		        ],
				[
						[
						        'company_name',
						        'description',
					        	'establishment_date',
						        'category',
						        'industry',
								'email',
								'phone_no',
								'mobile_no',
								'add_branches'
								
				        ] ,
				        'safe'
		        ],
	];
	}
	public function attributeLabels() {
		return [
				'company_id' => 'ID',
				'company_name' => 'Company Name',
				'description' => 'Description',
				'establishment_date' => 'Establishment Date',
				'category' => 'Category',
				'industry' => 'Industry',
				'email' => 'Email',
				'phone_no' => 'Phone No',
				'mobile_no' => 'Mobile No',
				'add_branches' =>'Add Branches'
				
	
		];
	}
	
	
}


