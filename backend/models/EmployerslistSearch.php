<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmployersList;

/**
 * EmployerslistSearch represents the model behind the search form about `app\models\EmployersList`.
 */
class EmployerslistSearch extends EmployersList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employerid', 'mobilenumber', 'userid'], 'integer'],
            [['name', 'dateofbirth', 'gender', 'designation', 'address', 'profileimage', 'create_date', 'updated_date', 'skills'], 'safe'],
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
        $query = EmployersList::find();

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
            'employerid' => $this->employerid,
            'mobilenumber' => $this->mobilenumber,
            'dateofbirth' => $this->dateofbirth,
            'userid' => $this->userid,
            'create_date' => $this->create_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'profileimage', $this->profileimage])
            ->andFilterWhere(['like', 'skills', $this->skills]);

        return $dataProvider;
    }
}
