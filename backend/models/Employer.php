<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employer".
 *
 * @property integer $id
 * @property string $username
 * @property string $mobilenumber
 * @property string $email
 * @property string $password
 */
class Employer extends \yii\db\ActiveRecord 
{
	/**
	 * @inheritdoc
	 */
	public $email;
	public $password;
	public $username;
	public $status;
	public $profileimagenew;
	public $roleid;
	
	public static function tableName() {
		return 'employer';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				
				[ 
						[ 
								'username',
								'email',
								'first_name',
								'last_name',
								'mobilenumber',
								'address',
								'gender',
								'dateofbirth',
								'designation',
								'profileimage',
								'skills'
						],
						'required','on' => 'signup' 
				],
				// [['name', 'gender', 'mobilenumber', 'designation', 'address', 'dateofbirth'], 'required'],
				[ 
						[ 
								'landline',
								'mobilenumber',
								'userid' 
						],
						'integer' 
				],
				[ 
						[ 
								'first_name' 
						],
						'string',
						'max' => 225 
				],
				[
				[
						'last_name'
				],
				'string',
				'max' => 225
				],
				[
				['profileimage'],'file'],
				
				[ 
						[ 
								'username',
								'email',
								'first_name',
								'last_name',
								'mobilenumber',
								'address',
								'gender',
								'dateofbirth',
								'designation',
								'profileimage',
								'skills',
								'landline',
								'description'
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
				'id' => 'ID',
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				'mobilenumber' => 'Mobile Number',
				'dateofbirth' => 'Date of Birth',
				'gender' => 'Gender',
				'designation' => 'Designation',
				'address' => 'Address',
				'userid' => 'Userid',
				'skills'=>'skills',
				'landline'=>'Landline',
				'description'=>'Description',
				'profileimage' =>'profile Image',
				
				'roleid' => 'Roleid' 
		];
	}
}