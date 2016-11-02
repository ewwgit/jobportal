<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class EmployeeForm extends Model
{
	
	public $username;
	public $email;	
	public $name;
	public $surname;
	public $gender;
	public $dateofbirth;
	public $mobilenumber;
	

	/*** Educational Details ***/
	
	
	public $highdegree;
	public $specialization;
	public $university;
	public $collegename;
	public $passingyear;

	
	/**** Preferences Details ****/
	
	
	public $functionalarea;
	public $jobrole;
	public $joblocation;
	public $experience;
	public $jobtype;
	public $expectedsalary;
	
	
	/*** Skills Details ***/
	
	public $skillname;
	public $lastused;
	public $skillexperience;
	
	
	
	public function rules()
	{
		return [
				
				
				['username', 'trim'],
				['username', 'required'],
				['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
				['username', 'string', 'min' => 2, 'max' => 255],
				
				['email', 'trim'],
				['email', 'required'],
				['email', 'email'],
				['email', 'string', 'max' => 255],
				['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
				
				['password', 'required'],
				['password', 'string', 'min' => 6],
				
				['confirmpassword', 'required'],
				['confirmpassword','compare', 'compareAttribute' => 'password'],
				['confirmpassword', 'string', 'min' => 6],
				
				[[ 'name', 'surname' ,'gender','dateofbirth','mobilenumber', 'confirmpassword','email','profileimage',], 'safe'],
				
	
				[[ 'highdegree', 'specialization', 'university','collegename','passingyear'], 'required'],
				// [['regid'], 'integer'],
				[['highdegree', 'specialization', 'university', 'collegename'], 'string', 'max' => 100],
				[[ 'highdegree', 'specialization' ,'university','collegename','passingyear','userid'], 'safe'],
				
				
				[[ 'functionalarea', 'jobrole', 'joblocation','experience','jobtype','expectedsalary'], 'required'],
				// [['regid'], 'integer'],
				[['functionalarea', 'jobrole', 'joblocation','experience', 'jobtype'], 'string', 'max' => 100],
				[[ 'functionalarea', 'jobrole' ,'joblocation','experience','jobtype','expectedsalary', 'userid'], 'safe'],
				
				
				
				[[ 'skillname', 'lastused', 'skillexperience'], 'required'],
				// [['regid'], 'integer'],
				[['skillname', 'skillexperience'], 'string', 'max' => 100],
				[[ 'skillname', 'lastused' ,'skillexperience','userid'], 'safe'],	
				
		];
	}
	
	

	
	
}