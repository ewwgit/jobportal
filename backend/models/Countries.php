<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property integer $id
 * @property string $sortname
 * @property string $name
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sortname', 'name'], 'required'],
            [['sortname'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sortname' => 'Sortname',
            'name' => 'Name',
        ];
    }
    
    public static function getCountries()
    {
    	$countriesModel = Countries::find()->select(['id', 'name'])
    	->asArray()
    	->all();
    	$countries = array();
    	for($k=0;$k<count($countriesModel); $k++)
    	{
    		$countries[$countriesModel[$k]['id']] = $countriesModel[$k]['name'];
    	}
    	return $countries;
    }
    public static function getStatesByCountry($countryId)
    {
    	$statesModel = States::find()->select(['id', 'name'])->asArray()->where(['country_id'=>$countryId])
    	->all();
    	$states = array();
    	for($k=0;$k<count($statesModel); $k++)
    	{
    		$states[$k]['id'] = $statesModel[$k]['id'];
    		$states[$k]['name'] = $statesModel[$k]['name'];
    	}
    	return $states;
    }
    public static function getCitiesByState($stateid)
    {
    	$citiesModel = Cities::find()->select(['id', 'name'])->asArray()->where(['state_id'=>$stateid])
    	->all();
    	$cities = array();
    	for($k=0;$k<count($citiesModel); $k++)
    	{
    		$cities[$k]['id'] = $citiesModel[$k]['id'];
    		$cities[$k]['name'] = $citiesModel[$k]['name'];
    	}
    	return $cities;
    }
    public static function getCountryName($countryId)
    {
    	$countryName = Countries::find()->select(['name'])->asArray()->where(['id'=>$countryId])
    	->one();
    	return $countryName['name'];
    }
    public static function getCountryId($countryname)
    {
    	$countryName = Countries::find()->select(['id'])->asArray()->where(['name'=>$countryname])
    	->one();
    	return $countryName['id'];
    }
    public static function getStatesByCountryview($countryId)
    {
    	$statesModel = States::find()->select(['id', 'name'])->asArray()->where(['country_id'=>$countryId])
    	->all();
    	$states = array();
    	for($k=0;$k<count($statesModel); $k++)
    	{
    		$states[$statesModel[$k]['id']] = $statesModel[$k]['name'];
    		
    	}
    	return $states;
    }
    
}
