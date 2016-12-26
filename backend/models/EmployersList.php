<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employer".
 *
 * @property integer $employerid
 * @property string $name
 * @property string $mobilenumber
 * @property string $dateofbirth
 * @property string $gender
 * @property string $designation
 * @property string $address
 * @property integer $userid
 * @property string $profileimage
 * @property string $create_date
 * @property string $updated_date
 * @property string $skills
 */
class EmployersList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobilenumber', 'dateofbirth', 'gender', 'designation', 'address', 'userid', 'profileimage', 'create_date', 'updated_date', 'skills'], 'required'],
            [['mobilenumber', 'userid'], 'integer'],
            [['dateofbirth', 'create_date', 'updated_date'], 'safe'],
            [['gender', 'address'], 'string'],
            [['name'], 'string', 'max' => 225],
            [['designation', 'skills'], 'string', 'max' => 100],
            [['profileimage'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employerid' => 'Employerid',
            'name' => 'Name',
            'mobilenumber' => 'Mobilenumber',
            'dateofbirth' => 'Dateofbirth',
            'gender' => 'Gender',
            'designation' => 'Designation',
            'address' => 'Address',
            'userid' => 'Userid',
            'profileimage' => 'Profileimage',
            'create_date' => 'Create Date',
            'updated_date' => 'Updated Date',
            'skills' => 'Skills',
        ];
    }
}
