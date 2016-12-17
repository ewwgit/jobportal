<?php

namespace frontend\models;

use yii\base\Model;
use Yii;

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
	public $company_name;
	public $dateofestablishment;
	public $employer_type;
	public $industry_type;
	public $location;
	public $country;
	public $state;
	public $city;
	public $zipcode;
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
	public $skill;
	public $lastused;
	public $skillexperience;
	/**
	 * Employer
	 */
	public $name;
	public $gender;
	public $mobilenumber;
	public $designation;
	public $address;
	public $dateofbirth;
	public $profileimage;
	public $profileimagenew;
	public function rules() {
		return [ 
				[ 
						[ 
						
						'name',
						'gender',
						'mobilenumber',
						'designation',
						'address',
						'dateofbirth',
						
// 						'skill',
// 						'lastused',
// 						'skillexperience',
						
						'salary',
						'weekly_days',
						'shift_timings',
						'work_location',
						//'no_of_openings',
						'experience',
						//'jobtype',
						'job_description',
						'job_title',
						'job_role',
						
						'expected_salary',
						'job_location',
						'job_role',
						
						'company_name',
						'dateofestablishment',
						'employer_type',
						'industry_type',
						'job_type',
						'location',
						'country',
						'state',
						'city',
						'zipcode',
						
						'passingyear',
						'collegename',
						'university',
						'specialization',
						'higherdegree'
					
						
						],
						'required' 
				], 
				['name',
				'match',
				'pattern' =>'/^[a-zA-Z0-9]+$/',
				'message' => 'username can only contain alphanumeric characters.'
						],
				[ 
						[ 
								'zipcode' 
						],
						'integer' 
				],
				
				[
				['profileimage'],'file'],
				
				[ 
						[ 
								'name',
								'gender',
								'mobilenumber',
								'designation',
								'address',
								'dateofbirth',
								'profileimage',
								'profileimagenew',
								
							'skill',
						'lastused',
						'skillexperience',
								
								'salary',
								'weekly_days',
								'shift_timings',
								'work_location',
								//'no_of_openings',
								'experience',
							//	'jobtype',
								'job_description',
								'job_title',
								'job_type',
								'job_role',
								
								'expected_salary',
								'job_location',
								'job_role',
								
								'company_name',
								'dateofestablishment',
								'employer_type',
								'industry_type',
								'location',
								'country',
								'state',
								'city',
								'zipcode',
								
								'passingyear',
								'collegename',
								'university',
								'specialization',
								'higherdegree' 
						]
					
						
						,
						'safe' 
				] 
		];
	}
}