<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kontrakt".
 *
 * @property int $id_kontrakt
 * @property int $id_proekt id proekta
 * @property float $k_summa summa kontrakta
 * @property string $k_valuta valuta kontarakta
 * @property int|null $k_spec specifikacia faily
 * @property string|null $k_zn zavodskiy nomera ustroistv, hfpltktys ;
 * @property string|null $k_d_okon data okonchaniya proizvodstva
 * @property string|null $k_d_post data postavki
 * @property string|null $k_d_pp data peredachi pasportz zakazchiku
 * @property int|null $k_oplata % oplati po kontraktu
 * @property int $k_kz kto sozdal kontrakt
 * @property string $k_ds kogda sozdan kontrakt
 * @property int|null $k_del udalen li kontrakt
 *
 * @property FileSpec[] $fileSpecs
 * @property FileTz[] $fileTzs
 * @property Kassa[] $kassas
 * @property Proekt $proekt
 */
class Kontrakt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kontrakt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proekt', 'k_summa', 'k_valuta', 'k_kz', 'k_ds'], 'required'],
            [['id_proekt', 'k_spec', 'k_oplata', 'k_kz', 'k_del'], 'integer'],
            [['k_summa'], 'number'],
            [['k_zn'], 'string'],
            [['k_d_okon', 'k_d_post', 'k_d_pp', 'k_ds'], 'safe'],
            [['k_valuta'], 'string', 'max' => 50],
            [['id_proekt'], 'exist', 'skipOnError' => true, 'targetClass' => Proekt::className(), 'targetAttribute' => ['id_proekt' => 'id_proekt']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kontrakt' => 'Id Kontrakt',
            'id_proekt' => 'id proekta',
            'k_summa' => 'Сумма контракта',
            'k_valuta' => 'Валюта контракта',
            'k_spec' => 'Файлы спецификации',
            'k_zn' => 'Заводские номера устройств, hfpltktys ;',
            'k_d_okon' => 'Дата окончания производства',
            'k_d_post' => 'Дата поставки',
            'k_d_pp' => 'Дата передачи паспортов заказчику',
            'k_oplata' => '% оплаты по контракту',
            'k_kz' => 'kto sozdal kontrakt',
            'k_ds' => 'kogda sozdan kontrakt',
            'k_del' => 'udalen li kontrakt',
        ];
    }

    /**
     * Gets query for [[FileSpecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFileSpecs()
    {
        return $this->hasMany(FileSpec::className(), ['id_kontrakt' => 'id_kontrakt']);
    }

    /**
     * Gets query for [[FileTzs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFileTzs()
    {
        return $this->hasMany(FileTz::className(), ['id_kontrakt' => 'id_kontrakt']);
    }

    /**
     * Gets query for [[Kassas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKassas()
    {
        return $this->hasMany(Kassa::className(), ['id_kontrakt' => 'id_kontrakt']);
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
