<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $c_id
 * @property string $c_name
 * @property string $c_path
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_name', 'c_path'], 'required'],
            [['c_name', 'c_path'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_name' => 'C Name',
            'c_path' => 'C Path',
        ];
    }
}
