<?php

namespace frontend\models;

use yii\base\Model;
use Yii;


/**
 * Signup form
 */
class EmployeeForm extends Model {
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
	public $userid;
	/**
	 * * Educational Details **
	 */
	public $highdegree;
	public $specialization;
	public $university;
	public $collegename;
	public $passingyear;
	
	/**
	 * ** Preferences Details ***
	 */
	public $functionalarea;
	public $jobrole;
	public $joblocation;
	public $experience;
	public $jobtype;
	public $expectedsalary;
	
	/**
	 * * Skills Details **
	 */
	public $skillname;
	public $lastused;
	
	public function rules() {
		return [
				[
						[
							
								'name',
								'email',
								'name',
								'surname',
								'gender',
								'dateofbirth',
								'mobilenumber',
								
								
								'highdegree',
								'specialization',
								'university',
								'collegename',
								'passingyear',
								
								'functionalarea',
								'jobrole',
								'joblocation',
								'experience',
								'jobtype',
								'expectedsalary',
								
								'skillname',
								'lastused'
								
								
								
								
								
				
						],
						'required'
				],
				
				[
						[
								'email',
								'name',
								'surname',
								'gender',
								'dateofbirth',
								'mobilenumber' ,
								
								
								'highdegree',
								'specialization',
								'university',
								'collegename',
								'passingyear',
								
								'functionalarea',
								'jobrole',
								'joblocation',
								'experience',
								'jobtype',
								'expectedsalary',
								
								'skillname',
								'lastused'
						
						],
						'safe'
				]
		];
	}
}
