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
class EmployeeSignup extends \yii\db\ActiveRecord {
	
	/**
	 * @inheritdoc
	 */
	public $resume;
	public static function tableName() {
		return 'employee_signup';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				
				[ 
						[ 
								'name',
								'surname',
								//'gender',
								'dateofbirth',
								'mobilenumber',
								//'profileimage' 
						],
						'required' 
				],
				// [['regid'], 'integer'],
				[ 
						[ 
								'name',
								'surname',
								'gender',
								'dateofbirth',
								'mobilenumber' 
						],
						'string',
						'max' => 100 
				],
				[ 
						[ 
								'profileimage' 
						],
						'file' 
				],
				[ 
						[ 
								'name',
								'surname',
								'gender',
								'dateofbirth',
								'mobilenumber' 
						],
						'safe' 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [ 
				'id' => 'id',
				'name' => 'Name',
				'surname' => 'Surname',
				'gender' => 'Gender',
				'dateofbirth' => 'Dateofbirth',
				'mobilenumber' => 'Mobilenumber',
				'profileimage' => 'Profileimage' 
		]
		;
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