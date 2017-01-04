<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmployerPackages;

/**
 * EmployerPackagesSearch represents the model behind the search form about `app\models\EmployerPackages`.
 */
class EmployerPackagesSearch extends EmployerPackages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_pid', 'userId', 'mem_id', 'status'], 'integer'],
            [['startDate', 'endDate', 'createdDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EmployerPackages::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'employer_pid' => $this->employer_pid,
            'userId' => $this->userId,
            'mem_id' => $this->mem_id,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'status' => $this->status,
            'createdDate' => $this->createdDate,
        ]);

        return $dataProvider;
    }
}
