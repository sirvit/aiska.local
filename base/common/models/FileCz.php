<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/** Чертежи завода */
/**
 * This is the model class for table "file_cz".
 *
 * @property int $id_file_cz
 * @property int|null $id_proekt
 * @property string|null $file_cz_content
 * @property string|null $file_cz_name
 * @property int|null $file_cz_kz
 * @property string|null $file_cz_ds
 * @property string|null $file_cz_del
 *
 * @property Proekt $proekt
 */
class FileCz extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_cz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proekt', 'file_cz_kz'], 'integer'],
            [['file_cz_content'], 'string'],
            [['file_cz_ds'], 'safe'],
            [['file_cz_name'], 'string', 'max' => 250],
            [['file_cz_del'], 'string', 'max' => 1],
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
            'id_file_cz' => 'Id Файла',
            'id_proekt' => 'Id Проекта',
            'file_cz_content' => 'ЧЗ Содержимое',
            'file_cz_name' => 'ЧЗ Имя',
            'file_cz_kz' => 'ЧЗ кто залил',
            'file_cz_ds' => 'ЧЗ дата создания',
            'file_cz_del' => 'ЧЗ удален',
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
