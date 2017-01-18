<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industrytype".
 *
 * @property integer $industrytype_id
 * @property string $name
 * @property string $description
 * @property string $status
 */
class Industrytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industrytype';
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
            'industrytype_id' => 'Industrytype ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
