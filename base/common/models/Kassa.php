<?php

namespace common\models;

use Yii;
/** Данные по кассе */
/**
 * This is the model class for table "kassa".
 *
 * @property int $id_kassa
 * @property int $id_kontrakt
 * @property string $kassa_n_doc nomer dokumenta
 * @property string $kassa_d_doc data dokumenta
 * @property string $kassa_d_summa summa po dokumentu
 * @property int $kassa_kz kto zavel stroku
 * @property string $kassa_ds data zavedeniya stroki
 * @property string|null $kassa_del udalen ili net
 *
 * @property Kontrakt $kontrakt
 */
class Kassa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kassa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kontrakt', 'kassa_n_doc', 'kassa_d_doc', 'kassa_d_summa', 'kassa_kz', 'kassa_ds'], 'required'],
            [['id_kontrakt', 'kassa_kz'], 'integer'],
            [['kassa_d_doc', 'kassa_ds'], 'safe'],
            [['kassa_n_doc', 'kassa_d_summa'], 'string', 'max' => 50],
            [['kassa_del'], 'string', 'max' => 1],
            [['id_kontrakt'], 'exist', 'skipOnError' => true, 'targetClass' => Kontrakt::className(), 'targetAttribute' => ['id_kontrakt' => 'id_kontrakt']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kassa' => 'Id Kassa',
            'id_kontrakt' => 'Id Kontrakt',
            'kassa_n_doc' => 'Номер документа',
            'kassa_d_doc' => 'Дата документа',
            'kassa_d_summa' => 'Сумма по документу',
            'kassa_kz' => 'kto zavel stroku',
            'kassa_ds' => 'data zavedeniya stroki',
            'kassa_del' => 'udalen ili net',
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
