<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EmployerJobpostings;

class JobpostSearch extends EmployerJobpostings
{
    public function rules()
    {
        return [
            [['rolecategory','skills','designation','experience','Description','jobtype','gender','address','company_name','company_type','industry_type','dateofestablishment','country','state','city','zipcode'], 'safe'],
       
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

      public function search($params)
    {
    	
    	if(isset($params['id']) && ($params['id'] != 0) )
    	{
    		$query = EmployerJobpostings::find()->where(['skills'=>$params['id']]);
    	}
    	else {
    		 $query = EmployerJobpostings::find();
    	}
    	if(isset($params['limit']) && ($params['limit'] != 0) )
    	{
    		$pagesize = $params['limit'];
    	}
    	else
    	{
    		$pagesize = 25;
    	}
       

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        		'pagination' => [
        				'pageSize' => 25,
        		],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere(['like', 'rolecategory', $this->rolecategory])
            ->andFilterWhere(['like', 'skills', $this->skills])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'dateofestablishment', $this->dateofestablishment]);

        return $dataProvider;
    }
}
