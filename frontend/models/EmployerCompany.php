<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "employercompany".
 *
 * @property integer $id
 * @property string $username
 * @property string $mobilenumber
 * @property string $email
 * @property string $password
 */
class EmployerCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
    	return 'employer_company';
    } 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
        		[['company_name',  'dateofestablishment', 'company_type',  'industry_type', 'location', 'country',  'state', 'city', 'zipcode'], 'required'],
        		[['zipcode'], 'integer'],
        		[['company_name', 'company_type', 'industry_type', 'location', 'country', 'state', 'city'], 'string', 'max' => 225],
        		
        		[['company_name',  'dateofestablishment', 'company_type',  'industry_type', 'location', 'country',  'state', 'city', 'zipcode','userid'
        				
        		], 'safe'],
        		];
           
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reg_id' => 'Reg ID',
        	'company_name' => 'Company Name',
            'dateofestablishment' => 'Dateofestablishment',
        	'company_type' => 'Company Type',
        	'industry_type' => 'Industry Type',
        	'location' => 'Location',
        	'country' => 'Country',
        	'state' => 'State',
        	'city' => 'City',
        	'zipcode' => 'Zipcode',
        		
        		'userid' => 'User Id',
        	//'roleid' => 'Roleid',
        ];
    }
}