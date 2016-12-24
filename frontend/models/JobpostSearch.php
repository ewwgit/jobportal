<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EmployerJobpostings;

class JobpostSearch extends EmployerJobpostings {
	
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
								'zipcode',
								'userid'
						],
						'safe' 
				] 
		];
	}
	public function scenarios() {
		return Model::scenarios ();
	}
	public function search($params) {
		$query = EmployerJobpostings::find ();
		
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
				'rolecategory',
				$this->rolecategory 
		] )->orFilterWhere ( [ 
				'like',
				'skills',
				$this->skills 
		] )->orFilterWhere ( [ 
				'like',
				'designation',
				$this->designation 
		] )->orFilterWhere ( [ 
				'like',
				'Min_Experience',
				$this->Min_Experience 
		] )->orFilterWhere ( [ 
				'like',
				'Max_Experience',
				$this->Max_Experience 
		] )->orFilterWhere ( [ 
				'like',
				'dateofestablishment',
				$this->dateofestablishment 
		] );
		
		return $dataProvider;
	}
}
