<?php

namespace frontend\models;

use yii\base\Model;
use Yii;


/**
 * Signup form
 */
class EmployeeForm extends Model {
	
	public $readchk;
	public $ability;
	public $empablty;
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
	public $profileimagenew;
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
	
	
	/*** Project Details ***/
	
	
	public $projecttitle;
	public $projectstartdate;
	public $projectenddate;
	public $projectlocation;
	public $employementtype;
	public $projectdescription;
	public $role;
	public $roledescription;
	public $teamsize;
	public $skillsused;
	

	
	/**
	 * * Skills Details **
	 */
	public $skillname;
	public $lastused;
	public $skillexperience;
	public $allSkills;
	
	
	/**** Employer Details**/
	
	
	public $employername;
	public $employertype;
	public $designation;
	
	/**** Other Details***/
	
	
	public $language;
	public $proficiencylevel;
	
	public $alllanguages;
	
	
	public $resume;
	
	
	
	
	
	public function rules() {
		return [
				[['empablty','ability','readchk'],'safe'	],
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
								'lastused',
								'skillexperience',
								
								
								'projecttitle',
								'projectstartdate',
								'projectenddate',
								'projectlocation',
								'employementtype',
								'projectdescription',
								'role',
								'roledescription',
								'teamsize',
								'skillsused',
								
							
								
								
								
								
				
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
								'lastused',
								'skillexperience',
								
								
								'employername',
								'employertype',
								'designation',
								
								'language',
								'proficiencylevel',
								
								'resume'
								
						
						],
						'safe'
				]
		];
	}
}
