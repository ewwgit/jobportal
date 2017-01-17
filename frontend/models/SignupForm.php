<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;
use frontend\models\EmployeeSignup;

/**
 * Signup form
 */
class SignupForm extends Model {
	public $username;
	public $email;
	public $password;
	public $confirmpassword;
	public $name;
	public $surname;
	public $gender;
	public $dateofbirth;
	public $mobilenumber;
	public $profileimage;
	public $country;
	public $state;
	public $city;
	public $description;
	public $noticeperiod;
	public $createdDate;
	public $updatedDate;
	
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
						'confirmpassword',
						'required' 
				],
				[ 
						'confirmpassword',
						'compare',
						'compareAttribute' => 'password' 
				],
				[ 
						'confirmpassword',
						'string',
						'min' => 6 
				],
				[
						'mobilenumber',
						'required',
				],
			  	  
				[
						'mobilenumber',
						'number',
				],
				
				[ 
						[ 
								'name',
								'surname',
								'gender',
								'dateofbirth',
								'mobilenumber',
								'confirmpassword',
								'email',
								'profileimage', 
								'country',
								'state',
								'city',
								'description',
								'noticeperiod',
								'createdDate',
								'updatedDate',
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
		$user->roleid = 3;
		$user->generateAuthKey ();
		
		return $user->save () ? $user : null;
	}
}
