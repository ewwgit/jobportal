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
class EmployeeEmployer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_employer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'employername', 'employertype','designation'], 'required'],
          
          //  [['skillname', 'skillexperience'], 'string', 'max' => 100],
        		[[ 'employername', 'employertype','designation' ,'userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'employername' => 'Employername',
            'employertype' => 'Employertype',
        	'designation' => 'Designation',	
          
        	'userid' => 'Userid',
        										
        		
        		
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
    public function getUseremployeepreference()
    {
    	return $this->hasOne(EmployeePreferences::className(), ['userid' => 'userid']);
    }
}

