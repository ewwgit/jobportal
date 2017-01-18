<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles_category".
 *
 * @property integer $roleId
 * @property string $role_name
 * @property string $status
 * @property string $description
 * @property string $createdDate
 * @property string $updatedDate
 */
class RolesCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name', 'status', 'description', 'createdDate', 'updatedDate'], 'required'],
            [['status', 'description'], 'string'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['role_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleId' => 'Role ID',
            'role_name' => 'Role Name',
            'status' => 'Status',
            'description' => 'Description',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
        ];
    }
}
