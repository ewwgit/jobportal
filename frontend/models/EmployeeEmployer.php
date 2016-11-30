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
}

