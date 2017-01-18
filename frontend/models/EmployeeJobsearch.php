<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EmployerJobpostings;

class EmployeeJobsearch extends EmployerJobpostings {
	
	public $skills;
	public $job_location;
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
								'job_location',
								'company_name',
								'company_type',
								'industry_type',
								'dateofestablishment',
								'country',
								
						],
						'safe' 
				] 
		];
	}
	public function scenarios() {
		return Model::scenarios ();
	}
	public function search($params) {
		$query = EmployerJobpostings::find ()->joinWith('jobnew', false, 'INNER JOIN')->joinWith('joblocation', false, 'INNER JOIN');
		
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
		$query->andWhere(['IN', 'skill_name', $this->skills]);
		}
		if(!empty($this->job_location))
		{
			$query->andWhere(['IN', 'location', $this->job_location]);
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


