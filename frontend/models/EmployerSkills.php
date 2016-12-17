<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "skills".
 *
 * @property integer $sid
 * @property string $requirment
 * @property string $keyskills
 * @property string $jobtype
 * @property integer $userid
 */
class EmployerSkills extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'skills';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
// 				[ 
// 						[ 
// 								'skillname',
// 								'lastused',
// 								'skillexperience',
// 								'userid' 
// 						],
// 						'required' 
// 				],
				[ 
						[ 
								'userid' 
						],
						'integer' 
				],
// 				[ 
// 						[ 
// 								'	',
// 								'companytype',
// 								'jobtype' 
// 						],
// 						'string',
// 						'max' => 220 
// 				],
				[ 
						[ 
								'skill',
// 								'lastused',
// 								'skillexperience',
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
				'sid' => 'Sid',
				'skillname' => 'skill',
				'lastused' => 'lastused',
				'skillexperience' => 'skillexperience',
				'userid' => 'Userid' 
		];
	}
}
