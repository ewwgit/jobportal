<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Memberships;

/**
 * MembershipsSearch represents the model behind the search form about `app\models\Memberships`.
 */
class MembershipsSearch extends Memberships
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mem_id', 'createdBy', 'updatedBy'], 'integer'],
            [['name', 'description', 'duration', 'cost', 'type', 'num_of_jobs_posting', 'status', 'createdDate', 'updatedDate'], 'safe'],
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
        $query = Memberships::find();

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
            'mem_id' => $this->mem_id,
            'createdDate' => $this->createdDate,
            'updatedDate' => $this->updatedDate,
            'createdBy' => $this->createdBy,
            'updatedBy' => $this->updatedBy,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'cost', $this->cost])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'num_of_jobs_posting', $this->num_of_jobs_posting])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
