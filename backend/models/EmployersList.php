<?php

namespace app\models;

use Yii;
use frontend\models\EmployerForm;

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
	public $first_name;
 public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'roleid'], 'required'],
            [['status', 'created_at', 'updated_at', 'roleid'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'roleid' => 'Roleid',
        ];
    }
    public function getEmployer()
    {
    	return $this->hasOne(EmployerForm::className(), ['userid' => 'employerid']);
    }
}
	