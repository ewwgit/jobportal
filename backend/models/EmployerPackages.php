<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employer_packages".
 *
 * @property integer $employer_pid
 * @property integer $userId
 * @property integer $mem_id
 * @property string $startDate
 * @property string $endDate
 * @property integer $status
 * @property string $createdDate
 */
class EmployerPackages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employer_packages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'mem_id', 'startDate', 'endDate', 'status', 'createdDate'], 'required'],
            [['userId', 'mem_id', 'status'], 'integer'],
            [['startDate', 'endDate', 'createdDate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employer_pid' => 'Employer Pid',
            'userId' => 'User ID',
            'mem_id' => 'Mem ID',
            'startDate' => 'Start Date',
            'endDate' => 'End Date',
            'status' => 'Status',
            'createdDate' => 'Created Date',
        ];
    }
}
