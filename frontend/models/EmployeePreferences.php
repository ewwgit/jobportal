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
}


