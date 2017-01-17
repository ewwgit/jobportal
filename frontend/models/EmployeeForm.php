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
	public $country;
	public $state;
	public $city;
	public $countriesList;
	public $description;
	public $noticeperiod;
	public $createdDate;
	public $updatedDate;
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
	public $allskills;
	

	
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
	public $statesData;
	public $citiesData;
	
	
	
	
	
	
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
								'country',
								'state',
								'city',
								'description',
								
								
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
								
								'language',
								'proficiencylevel',
								'ability',
								
								
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
						'email',
						'email',
				],
				[
						'mobilenumber',
						'number',
				],
			
				[
						[
								'email',
								'name',
								'surname',
								'gender',
								'dateofbirth',
								'mobilenumber' ,
								'noticeperiod',
								'updatedDate',
								
								
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
								
								'resume',
								'country',
								'state',
								'city',
								'description',
								'statesData',
								'citiesData',
								
						
						],
						'safe'
				]
		];
	}
}
