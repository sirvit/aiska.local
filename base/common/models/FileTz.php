<?php

namespace common\models;

use Yii;
/** Файлы Тех. задания */
/**
 * This is the model class for table "file_tz".
 *
 * @property int $id_file_tz
 * @property int $id_kontrakt
 * @property resource|null $file_tz_content
 * @property string|null $file_tz_name
 * @property int|null $file_tz_kz
 * @property string|null $file_tz_ds
 * @property string|null $file_tz_del
 *
 * @property Kontrakt $kontrakt
 */
class FileTz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_tz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kontrakt'], 'required'],
            [['id_kontrakt', 'file_tz_kz'], 'integer'],
            [['file_tz_content'], 'string'],
            [['file_tz_ds'], 'safe'],
            [['file_tz_name'], 'string', 'max' => 250],
            [['file_tz_del'], 'string', 'max' => 1],
            [['id_kontrakt'], 'exist', 'skipOnError' => true, 'targetClass' => Kontrakt::className(), 'targetAttribute' => ['id_kontrakt' => 'id_kontrakt']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_file_tz' => 'Id File Tz',
            'id_kontrakt' => 'Id Kontrakt',
            'file_tz_content' => 'File Tz Content',
            'file_tz_name' => 'File Tz Name',
            'file_tz_kz' => 'File Tz Kz',
            'file_tz_ds' => 'File Tz Ds',
            'file_tz_del' => 'File Tz Del',
        ];
    }

    /**
     * Gets query for [[Kontrakt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKontrakt()
    {
        return $this->hasOne(Kontrakt::className(), ['id_kontrakt' => 'id_kontrakt']);
    }
}
