<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class EmployerSignup extends Model {
	public $username;
	public $email;
	public $password;
	public $name;
	public $mobilenumber;
	public $dateofbirth;
	public $gender;
	public $designation;
	public $address;
	public $company_name;
	public $dateofestablishment;
	public $company_type;
	public $industry_type;
	public $location;
	public $country;
	public $state;
	public $city;
	public $zipcode;
	public $profileimage;
	public $create_date;
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						'username',
						'trim' 
				],
				[ 
						'username',
						'required' 
				],
				[ 
						'username',
						'unique',
						'targetClass' => '\common\models\User',
						'message' => 'This username has already been taken.' 
				],
				[ 
						'username',
						'string',
						'min' => 2,
						'max' => 255 
				],
				
				[ 
						'email',
						'trim' 
				],
				[ 
						'email',
						'required' 
				],
				[ 
						'email',
						'email' 
				],
				[ 
						'email',
						'string',
						'max' => 255 
				],
				[ 
						'email',
						'unique',
						'targetClass' => '\common\models\User',
						'message' => 'This email address has already been taken.' 
				],
				
				[ 
						'password',
						'required' 
				],
				[ 
						'password',
						'string',
						'min' => 6 
				],
				[
				[
						'profileimage'
				],
				'file'
								],
				[ 
						[ 
								'username',
								'email',
								'name',
								'mobilenumber',
								'address',
								'gender',
								'dateofbirth',
								'designation' ,
								'create_date'
						],
						'safe' 
				] 
		];
	}
	
	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup() {
		if (! $this->validate ()) {
			return null;
		}
		
		$user = new User ();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword ( $this->password );
		$user->roleid = 2;
		$user->generateAuthKey ();
		
		return $user->save () ? $user : null;
	}
}
