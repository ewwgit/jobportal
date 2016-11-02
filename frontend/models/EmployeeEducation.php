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
class EmployeeEducation extends \yii\db\ActiveRecord
{
    
	public $username;
	public $email;
	public $password;
	public $name;
	public $surname;
	public $gender;
	public $dateofbirth;
	public $mobilenumber;
	
    public static function tableName()
    {
        return 'employee_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'highdegree', 'specialization', 'university','collegename','passingyear'], 'required'],
           // [['regid'], 'integer'],
            [['highdegree', 'specialization', 'university', 'collegename'], 'string', 'max' => 100],
        		[[ 'highdegree', 'specialization' ,'university','collegename','passingyear','userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'highdegree' => 'Highdegree',
            'specialization' => 'Specialization',
            'university' => 'University',
           	'collegename' => 'Collegename',
        	'passingyear' => 'Passingyear',
        		'userid' => 'Userid'
        	
        		
        ];
    }
}

