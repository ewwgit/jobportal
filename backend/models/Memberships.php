<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "memberships".
 *
 * @property integer $mem_id
 * @property string $name
 * @property string $description
 * @property string $duration
 * @property string $cost
 * @property string $type
 * @property string $num_of_jobs_posting
 * @property string $status
 * @property string $createdDate
 * @property string $updatedDate
 * @property integer $createdBy
 * @property integer $updatedBy
 */
class Memberships extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memberships';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description',  'cost', 'currency', 'type', 'num_of_jobs_posting', 'status'], 'required'],
            [['description', 'type', 'status'], 'string'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['createdBy', 'updatedBy'], 'integer'],
            [['name', 'duration', 'cost', 'num_of_jobs_posting'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mem_id' => 'Mem ID',
            'name' => 'Name',
            'description' => 'Description',
            'duration' => 'Duration',
            'cost' => 'Cost',
        	'currency' => 'Currency',
            'type' => 'Type',
            'num_of_jobs_posting' => 'Num Of Jobs Posting',
            'status' => 'Status',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
        ];
    }
}
