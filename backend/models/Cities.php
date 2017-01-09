<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $id
 * @property string $name
 * @property integer $state_id
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'state_id'], 'required'],
            [['state_id'], 'integer'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'state_id' => 'State ID',
        ];
    }
    public static function getCityName($cityId)
    {
    	$citiesModel = Cities::find()->select(['name'])->asArray()->where(['id'=>$cityId])
    	->one();
    	return $citiesModel['name'];
    }
    public static function getCiteslist($stateId)
    {
    	$citiesModel = Cities::find()->select(['id','name'])->asArray()->where(['state_id'=>$stateId])
    	->all();
    	$cities = array();
    	for($k=0;$k<count($citiesModel); $k++)
    	{
    		$cities[$citiesModel[$k]['id']] = $citiesModel[$k]['name'];
    		
    	}
    	return $cities;
    }
    public static function getCityId($cityName)
    {
    	$citiesModel = Cities::find()->select(['id'])->asArray()->where(['name'=>$cityName])
    	->one();
    	return $citiesModel['id'];
    }
}
