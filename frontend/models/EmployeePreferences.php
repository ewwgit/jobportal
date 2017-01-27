<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;


/**
 * This is the model class for table "employee_signup".
 *
 * @property integer $regid
 * @property string $name
 * @property string $surname
 * @property string $mobilenumber
 * @property string $password
 */
class EmployeePreferences extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_preferences';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'functionalarea', 'jobrole', 'joblocation','experience','jobtype','expectedsalary'], 'required'],
           // [['regid'], 'integer'],
            [['functionalarea', 'jobrole', 'joblocation','experience', 'jobtype'], 'string', 'max' => 100],
        		[[ 'functionalarea', 'jobrole' ,'joblocation','experience','jobtype','expectedsalary', 'userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        		
        		'functionalarea' => 'Functionalarea',
            
            'jobrole' => 'jobrole',
        		'joblocation' =>'Joblocation',
           	'experience' => 'Experience',
        	'jobtype' => 'Jobtype',
        		'expectedsalary'=>'Expectedsalary',
        		
        		'userid' => 'Userid'
        	
        		
        ];
    }
    
    
    public function getUser()
    {
    	return $this->hasOne(User::className(), ['id' => 'userid']);
    }
    public function getUsersignup()
    {
    	return $this->hasOne(EmployeeSignup::className(), ['userid' => 'userid']);
    }
    public function getUseremployee()
    {
    	return $this->hasOne(EmployeeEmployer::className(), ['userid' => 'userid']);
    }
    
    public function getUseremployeepreference()
    {
    	return $this->hasOne(EmployeePreferences::className(), ['userid' => 'userid']);
    }
}


