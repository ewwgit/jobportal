<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employer_preferences".
 *
 * @property integer $setid
 * @property integer $expected_salary
 * @property string $job_location
 * @property string $job_role
 * @property integer $userid
 */
class EmployerPreferences extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'employer_preferences';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'expected_salary',
								'job_location',
								'job_role',
								'userid' 
						],
						'required' 
				],
				[ 
						[ 
								'userid' 
						],
						'integer' 
				],
				[ 
						[ 
								'job_location',
								'job_role',
								'expected_salary' 
						],
						'string',
						'max' => 100 
				],
				[ 
						[ 
								'expected_salary',
								'job_location',
								'job_role',
								'userid' 
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
				'setid' => 'Setid',
				'expected_salary' => 'Expected Salary',
				'job_location' => 'Job Location',
				'job_role' => 'Job Role',
				'userid' => 'Userid' 
		];
	}
}