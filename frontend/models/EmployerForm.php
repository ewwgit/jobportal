<?php

namespace frontend\models;

use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper ;
use backend\models\Specializations;


class EmployerForm extends Model {
	
	/**
	 * EmployerSignup
	 */
	public $email;
	public $password;
	public $username;
	/**
	 * EmployerEducation
	 */
	public $higherdegree;
	public $specialization;
	public $university;
	public $collegename;
	public $passingyear;
	/**
	 * EmployerCompany
	 */

	/**
	 * EmployerPreferencess
	 */
	public $expected_salary;
	public $job_location;
	public $job_role;
	public $userid;
	/**
	 * EmployerEmployement
	 */
	public $company_name;
	public $job_title;
	public $job_type;
	public $job_description;
	public $experience;
	public $no_of_openings;
	public $work_location;
	public $shift_timings;
	public $weekly_days;
	public $salary;
	/**
	 * EmployerSkills
	 */
	public $sid;
	public $skills;
	public $lastused;
	public $skillexperience;
	/**
	 * Employer
	 */
	public $first_name;
	public $last_name;
	public $gender;
	public $mobilenumber;
	public $landline;
	public $designation;
	public $address;
	public $dateofbirth;
	public $profileimage;
	public $profileimagenew;
	public $allskills;
	public $description;
	
	
	
	public function rules() {
		return [ 
				[ 
						[ 
						
						'first_name',
						'last_name',
						'gender',
						'mobilenumber',
						'designation',
						'address',
						'dateofbirth',
						
 						'skills',

						
						'salary',
						'weekly_days',
						'shift_timings',
						'work_location',
						
						'experience',
						
						'job_description',
						'job_title',
						'job_role',
					    'company_name',
						
						'expected_salary',
						'job_location',
						'job_role',
						

						
						'passingyear',
						'collegename',
						'university',
						'specialization',
						'higherdegree'
					
						
						],
						'required' 
				], 
				['first_name',
				'match',
				'pattern' =>'/^[a-zA-Z0-9]+$/',
				'message' => 'username can only contain alphanumeric characters.'
						],
				['last_name',
				'match',
				'pattern' =>'/^[a-zA-Z0-9]+$/',
				'message' => 'username can only contain alphanumeric characters.'
						],

				
				[
				['profileimage'],'file'],
				
				[ 
						[ 
								'first_name',
								'last_name',
								'gender',
								'mobilenumber',
								'designation',
								'address',
								'dateofbirth',
								'profileimage',
								'profileimagenew',
								
							'skills',

								
								'salary',
								'weekly_days',
								'shift_timings',
								'work_location',
							
								'experience',
							
								'job_description',
								'job_title',
								'job_type',
								'job_role',
								'company_name',
								
								'expected_salary',
								'job_location',
								'job_role',
								

								
								'passingyear',
								'collegename',
								'university',
								'specialization',
								'higherdegree' ,
								'landline',
								'description'
						]
					
						
						,
						'safe' 
				] 
		];
	}

	
	
}