<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employer_education".
 *
 * @property string $higherdegree
 * @property string $specialization
 * @property string $university
 * @property string $collegename
 * @property string $passingyear
 * @property integer $userid
 */
class EmployerEducation extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'employer_education';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'higherdegree',
								'specialization',
								'university',
								'collegename',
								'passingyear',
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
								'higherdegree',
								'specialization',
								'university',
								'collegename' 
						],
						'string',
						'max' => 220 
				],
				[ 
						[ 
								'higherdegree',
								'specialization',
								'university',
								'collegename',
								'passingyear',
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
				'eduid' => 'Eduid',
				'higherdegree' => 'Higherdegree',
				'specialization' => 'Specialization',
				'university' => 'University',
				'collegename' => 'Collegename',
				'passingyear' => 'Passingyear',
				'userid' => 'Userid' 
		];
	}
}