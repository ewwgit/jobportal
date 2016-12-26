<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EmployerJobpostings;

class MatchingJobsearch extends EmployerJobpostings {
	
	public function rules() {
		return [ 
				[ 
						[ 
								'rolecategory',
								'skills',
								'designation',
								'Min_Experience',
								'Max_Experience',
								'Description',
								'jobtype',
								'gender',
								'address',
								'company_name',
								'company_type',
								'industry_type',
								'dateofestablishment',
								'country',
								'state',
								'city',
								'zipcode' 
						],
						'safe' 
				] 
		];
	}
	public function scenarios() {
		return Model::scenarios ();
	}
	public function search($params) {
		
		
		if(isset($params['skills']) || isset($params['Min_Experience']) || isset($params['designation']) || isset($params['jobtype']) || isset($params['CTC']) || isset($params['city']) )
		{
			$query = EmployerJobpostings::find();
		}
		else {
			$query = EmployerJobpostings::find();
		}
		
		
		
		
		
		
		
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $query 
		]
		 );
		
		$this->load ( $params );
		
		if (! $this->validate ()) {
			
			return $dataProvider;
		}
		
		
		
		$query->orFilterWhere ( [ 
				'like',
				'skills',
			
		] )->orFilterWhere ( [ 
				'like',
				'Min_Experience',
				
		] )->orFilterWhere ( [ 
				'like',
				'designation',
				
		] )->orFilterWhere ( [ 
				'like',
				'jobtype',
			
		] )->orFilterWhere ( [ 
				'like',
				'CTC',
				
		] )->orFilterWhere ( [ 
				'like',
				'city',
			
		] );
		
		return $dataProvider;
	}
}

