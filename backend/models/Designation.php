<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "designation".
 *
 * @property integer $designation_id
 * @property string $designation_name
 * @property string $designation_description
 * @property string $status
 */
class Designation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'status'], 'required'],
            [['status'], 'string'],
            [['name', 'description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'designation_id' => 'Designation ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
