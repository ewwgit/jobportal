<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EmployerJobpostings;

class EmployeeJobsearch extends EmployerJobpostings {
	
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
		$query = EmployerJobpostings::find ();
		
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $query 
		]
		 );
		//print_r($params);exit();
		$this->load ( $params );
		
		if (! $this->validate ()) {
			
			return $dataProvider;
		}
		if(!empty($this->skills))
		{
		$query->joinWith('jobnew', false, 'INNER JOIN')->where(['IN', 'skill_name', $this->skills]);
		}
		$query->andFilterWhere ( [ 
				'like',
				'rolecategory',
				$this->rolecategory 
		] )->andFilterWhere ( [ 
				'like',
				'designation',
				$this->designation 
		] )->andFilterWhere ( [ 
				'like',
				'Min_Experience',
				$this->Min_Experience 
		] )->andFilterWhere ( [ 
				'like',
				'Max_Experience',
				$this->Max_Experience 
		] )->andFilterWhere ( [ 
				'like',
				'dateofestablishment',
				$this->dateofestablishment 
		] );
		
		return $dataProvider;
	}
}


