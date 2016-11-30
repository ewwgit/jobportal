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
class EmployeeLanguages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'language', 'proficiencylevel','ability',], 'required'],
          
          //  [['skillname', 'skillexperience'], 'string', 'max' => 100],
        		[[ 'language', 'proficiencylevel' ,'ability','userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'language' => 'Language',
            'proficiencylevel' => 'Proficiencylevel',
        	 'ability' => 'Ability',	
          
        	'userid' => 'Userid',
        										
        		
        		
        ];
    }
}

