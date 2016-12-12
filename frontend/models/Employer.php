<?php

namespace frontend\models;

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
class Employer extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public $email;
	public $password;
	public $username;
	public $profileimagenew;
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
								'name',
								'mobilenumber',
								'address',
								'gender',
								'dateofbirth',
								'designation',
								'profileimage',
						],
						'required','on' => 'signup' 
				],
				// [['name', 'gender', 'mobilenumber', 'designation', 'address', 'dateofbirth'], 'required'],
				[ 
						[ 
								'mobilenumber',
								'userid' 
						],
						'integer' 
				],
				[ 
						[ 
								'name' 
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
								'name',
								'mobilenumber',
								'address',
								'gender',
								'dateofbirth',
								'designation',
								'profileimage'
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
				'name' => 'Name',
				'mobilenumber' => 'Mobilenumber',
				'dateofbirth' => 'Dateofbirth',
				'gender' => 'Gender',
				'designation' => 'Designation',
				'address' => 'Address',
				'userid' => 'Userid',
				'profileimage' =>'profileimage',
				
				'roleid' => 'Roleid' 
		];
	}
}