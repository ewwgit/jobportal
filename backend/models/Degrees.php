<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "degrees".
 *
 * @property integer $degree_id
 * @property string $degreename
 * @property string $description
 * @property string $status
 */
class Degrees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'degrees';
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
            'degree_id' => 'Degree ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
