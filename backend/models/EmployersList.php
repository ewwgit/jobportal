<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_employer".
 *
 * @property integer $employerid
 * @property string $employername
 * @property string $employertype
 * @property string $designation
 * @property integer $userid
 */
class EmployersList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_employer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employername', 'employertype', 'designation', 'userid'], 'required'],
            [['userid'], 'integer'],
            [['employername', 'employertype', 'designation'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employerid' => 'Employerid',
            'employername' => 'Employername',
            'employertype' => 'Employertype',
            'designation' => 'Designation',
            'userid' => 'Userid',
        ];
    }
}
