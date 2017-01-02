<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specializations".
 *
 * @property integer $specialization_id
 * @property string $name
 * @property string $description
 * @property string $status
 */
class Specializations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specializations';
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
            'specialization_id' => 'Specialization ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
