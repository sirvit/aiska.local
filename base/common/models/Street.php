<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "street".
 *
 * @property int $s_id
 * @property string|null $s_name
 * @property string|null $s_path
 */
class Street extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'street';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['s_name', 's_path'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            's_id' => 'id улицы',
            's_name' => 'Название улицы',
            's_path' => 'Путь улицы',
        ];
    }
}
