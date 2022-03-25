<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/** Чертежи проекта */
/**
 * This is the model class for table "file_cp".
 *
 * @property int $id_file_cp
 * @property int|null $id_proekt
 * @property string|null $file_cp_content
 * @property string|null $file_cp_name
 * @property int|null $file_cp_kz
 * @property string|null $file_cp_ds
 * @property string|null $file_cp_del
 *
 * @property Proekt $proekt
 */
class FileCp extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_cp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proekt', 'file_cp_kz'], 'integer'],
            [['file_cp_content'], 'string'],
            [['file_cp_ds'], 'safe'],
            [['file_cp_name'], 'string', 'max' => 250],
            [['file_cp_del'], 'string', 'max' => 1],
            [['id_proekt'], 'exist', 'skipOnError' => true, 'targetClass' => Proekt::className(), 'targetAttribute' => ['id_proekt' => 'id_proekt']],
            [['file'], 'file', 'maxFiles'=>10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_file_cp' => 'Id Файла',
            'id_proekt' => 'Id Проекта',
            'file_cp_content' => 'ЧП Содержимое',
            'file_cp_name' => 'ЧП Имя',
            'file_cp_kz' => 'ЧП кто залил ',
            'file_cp_ds' => 'ЧП дата создания',
            'file_cp_del' => 'ЧЗ удален',
            'file' => 'Файл',
        ];
    }

    /**
     * Gets query for [[Proekt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProekt()
    {
        return $this->hasOne(Proekt::className(), ['id_proekt' => 'id_proekt']);
    }
}
