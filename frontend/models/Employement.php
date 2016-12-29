<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employement".
 *
 * @property integer $id
 * @property string $job_title
 * @property string $job_role
 * @property string $job_type
 * @property string $job_description
 * @property string $experience
 * @property string $no_of_openings
 * @property string $work_location
 * @property string $shift_timings
 * @property integer $weekly_days
 * @property integer $salary
 * @property integer $userid
 */
class Employement extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'employement';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
				// [['job_title', 'job_role', 'job_type', 'job_description', 'experience', 'no_of_openings', 'work_location', 'shift_timings', 'weekly_days', 'salary', 'userid'], 'required'],
				// [['id', 'weekly_days', 'salary', 'userid'], 'integer'],
				// [['job_description'], 'string'],
				// [['job_title', 'job_role', 'job_type', 'work_location', 'shift_timings'], 'string', 'max' => 220],
				// [['experience', 'no_of_openings'], 'string', 'max' => 100],
				[ 
						[ 
								'id',
								'company_name',
								'job_title',
								'job_role',
								'job_type',
								'job_description',
								'experience',
								
								'work_location',
								'shift_timings',
								'weekly_days',
								'salary',
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
				'id' => 'ID',
				'company_name' => 'company_name',
				'job_title' => 'Job Title',
				'job_role' => 'Job Role',
				'job_type' => 'Job Type',
				'job_description' => 'Job Description',
				'experience' => 'Experience',
			
				'work_location' => 'Work Location',
				'shift_timings' => 'Shift Timings',
				'weekly_days' => 'Weekly Days',
				'salary' => 'Salary',
				'userid' => 'Userid' 
		];
	}
}