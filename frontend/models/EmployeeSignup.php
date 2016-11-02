<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employee_signup".
 *
 * @property integer $regid
 * @property string $name
 * @property string $surname
 * @property string $mobilenumber
 * @property string $password
 */
class EmployeeSignup extends \yii\db\ActiveRecord
{
	
	
	
	
	public $highdegree;
	public $specialization;
	public $university;
	public $collegename;
	public $passingyear;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_signup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'name', 'surname', 'gender','dateofbirth','mobilenumber','profileimage'], 'required'],
           // [['regid'], 'integer'],
            [['name', 'surname','gender','dateofbirth','mobilenumber'], 'string', 'max' => 100],
        		[['profileimage'],'file'],
        		[[ 'name', 'surname' ,'gender','dateofbirth','mobilenumber',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'name' => 'Name',
            'surname' => 'Surname',
           	'gender' => 'Gender',
        	'dateofbirth' => 'Dateofbirth',
        	'mobilenumber' => 'Mobilenumber',
        		'profileimage' => 'Profileimage'
        		
        		
        ];
    }
}