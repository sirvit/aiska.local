<?php

namespace common\models;

use Yii;
/** Файлы спецификаций */
/**
 * This is the model class for table "file_spec".
 *
 * @property int $id_file_spec
 * @property int $id_kontrakt
 * @property resource|null $file_spec_content
 * @property string|null $file_spec_name
 * @property int|null $file_spec_kz
 * @property string|null $file_spec_ds
 * @property string|null $file_spec_del
 *
 * @property Kontrakt $kontrakt
 */
class FileSpec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_spec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kontrakt'], 'required'],
            [['id_kontrakt', 'file_spec_kz'], 'integer'],
            [['file_spec_content'], 'string'],
            [['file_spec_ds'], 'safe'],
            [['file_spec_name'], 'string', 'max' => 250],
            [['file_spec_del'], 'string', 'max' => 1],
            [['id_kontrakt'], 'exist', 'skipOnError' => true, 'targetClass' => Kontrakt::className(), 'targetAttribute' => ['id_kontrakt' => 'id_kontrakt']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_file_spec' => 'Id File Spec',
            'id_kontrakt' => 'Id Kontrakt',
            'file_spec_content' => 'File Spec Content',
            'file_spec_name' => 'File Spec Name',
            'file_spec_kz' => 'File Spec Kz',
            'file_spec_ds' => 'File Spec Ds',
            'file_spec_del' => 'File Spec Del',
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
