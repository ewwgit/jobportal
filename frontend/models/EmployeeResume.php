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
class EmployeeResume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'employee_resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'resume', ], 'required'],
          
          //  [['skillname', 'skillexperience'], 'string', 'max' => 100],
        		[[ 'resume','userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'resume' => 'Resume',
           
        	'userid' => 'Userid',
        										
        		
        		
        ];
    }
}


