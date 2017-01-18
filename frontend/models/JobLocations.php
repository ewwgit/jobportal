<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "job_locations".
 *
 * @property integer $job_loc_id
 * @property integer $jobid
 * @property string $location
 *
 * @property EmployerPostJobs $job
 */
class JobLocations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobid', 'location'], 'required'],
            /* [['jobid'], 'integer'],
            [['location'], 'string', 'max' => 200], */
            /* [['jobid'], 'exist', 'skipOnError' => true, 'targetClass' => EmployerPostJobs::className(), 'targetAttribute' => ['jobid' => 'id']], */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_loc_id' => 'Job Loc ID',
            'jobid' => 'Jobid',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(EmployerPostJobs::className(), ['id' => 'jobid']);
    }
}
