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
class EmployerSkills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requirment', 'companytype', 'jobtype', 'userid'], 'required'],
            [['userid'], 'integer'],
            [['requirment', 'companytype', 'jobtype'], 'string', 'max' => 220],
        	[['requirment', 'companytype', 'jobtype', 'userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sid' => 'Sid',
            'requirment' => 'Requirment',
            'companytype' => 'company type',
            'jobtype' => 'jobtype',
            'userid' => 'Userid',
        ];
    }
}
