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
class EmployeeSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'skillname', 'lastused'], 'required'],
          
          //  [['skillname', 'skillexperience'], 'string', 'max' => 100],
        		[[ 'skillname', 'lastused' ,'userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'skillname' => 'Skillname',
            'lastused' => 'Lastused',
          
        	'userid' => 'Userid',
        										
        		
        		
        ];
    }
}

