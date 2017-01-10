<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "job_skills".
 *
 * @property integer $jskId
 * @property integer $jobid
 * @property string $skill_name
 *
 * @property EmployerPostJobs $job
 */
class JobSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobid', 'skill_name'], 'safe'],
            /* [['jobid'], 'integer'],
            [['skill_name'], 'string', 'max' => 200],
            [['jobid'], 'exist', 'skipOnError' => true, 'targetClass' => EmployerPostJobs::className(), 'targetAttribute' => ['jobid' => 'id']], */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jskId' => 'Jsk ID',
            'jobid' => 'Jobid',
            'skill_name' => 'Skill Name',
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
