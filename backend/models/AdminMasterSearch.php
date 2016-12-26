<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property string $email
 * @property string $firstName
 * @property string $lastName
 * @property string $phoneNumber
 * @property string $profileImage
 * @property integer $roleId
 * @property string $password
 * @property integer $status
 * @property string $createdDate
 * @property string $updatedDate
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $address
 * @property string $repOptions
 * @property string $paidAmount
 */
class AdminMasterSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'password_reset_token', 'auth_key', 'email', 'firstName', 'lastName', 'phoneNumber', 'profileImage', 'roleId', 'password', 'status', 'createdDate', 'updatedDate', 'createdBy', 'updatedBy', 'created_at', 'updated_at', 'address', 'repOptions', 'paidAmount'], 'required'],
            [['profileImage', 'address', 'repOptions'], 'string'],
            [['roleId', 'status', 'createdBy', 'updatedBy', 'created_at', 'updated_at'], 'integer'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['paidAmount'], 'number'],
            [['username', 'password_hash', 'password_reset_token', 'auth_key', 'email', 'firstName', 'lastName', 'phoneNumber', 'password'], 'string', 'max' => 200],
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
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'phoneNumber' => 'Phone Number',
            'profileImage' => 'Profile Image',
            'roleId' => 'Role ID',
            'password' => 'Password',
            'status' => 'Status',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'address' => 'Address',
            'repOptions' => 'Rep Options',
            'paidAmount' => 'Paid Amount',
        ];
    }
}
