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
								
								
								'company_name',
								'company_type',
								'industry_type',
								'dateofestablishment',
								'country',
								
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
		if(isset($params['userid']) && ($params['userid'] != 0) )
		{
			$query = EmployerJobpostings::find()->where(['userid'=>$params['userid']]);
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
		
		
		$query->andFilterWhere ( [ 
				'like',
				'rolecategory',
				$this->rolecategory 
		] )->andFilterWhere ( [ 
				'like',
				'skills',
				$this->skills 
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
