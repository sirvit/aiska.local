<?php

namespace common\models;

use Yii;
use common\models\City;
use common\models\Street;

/**
 * This is the model class for table "priem".
 *
 * @property int $priem_id Номер
 * @property string|null $nomer Номер заявления
 * @property string|null $data_pz Дата подачи заявления
 * @property int|null $gorod Город
 * @property int|null $ulica Улица
 * @property int|null $d_u Дом или участок
 * @property string|null $dom Дом
 * @property string|null $kvartira Квартира
 * @property string|null $tel Телефон
 * @property string|null $family Фамилия
 * @property string|null $name Имя
 * @property string|null $otch Отчество
 * @property int|null $doc1 Документы 1
 * @property int|null $doc2 Документы 2
 * @property int|null $doc3 Документы 3
 * @property int|null $vidr Вид работ обслед. или рег.
 * @property float|null $koef Коэффициент срочности
 * @property float|null $avans Сумма аванса
 * @property string|null $avans_date Дата аванса
 * @property string|null $obsl_date Дата обследования
 * @property float|null $summa Сумма окончательная
 * @property string|null $date_v Дата выдачи
 * @property string|null $summa_date Дата доплаты
 * @property string|null $date_pol Дата получения документов
 * @property int|null $technik Кто выполнял работу
 * @property string|null $invent_tip Что инвентаризируем
 * @property string|null $vnes_izm Вносим изменения
 * @property int|null $kto_prz Кто принял заявку
 * @property string|null $data_kvz Когда принята заявка
 * @property float|null $summa_techn Сумма техника
 * @property int|null $date_koef Сколько дней на работу
 */
class Priem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'priem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_pz', 'avans_date', 'obsl_date', 'date_v', 'summa_date', 'date_pol', 'data_kvz'], 'safe'],
            [['gorod', 'ulica', 'd_u', 'doc1', 'doc2', 'doc3', 'vidr', 'technik', 'kto_prz', 'date_koef'], 'integer'],
            [['koef', 'avans', 'summa', 'summa_techn'], 'number'],
            [['nomer'], 'string', 'max' => 10],
            [['dom', 'kvartira', 'tel'], 'string', 'max' => 50],
            [['family', 'name', 'otch', 'invent_tip', 'vnes_izm'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'priem_id' => 'Priem ID',
            'nomer' => 'Nomer',
            'data_pz' => 'Data Pz',
            'gorod' => 'Gorod',
            'ulica' => 'Ulica',
            'd_u' => 'D U',
            'dom' => 'Dom',
            'kvartira' => 'Kvartira',
            'tel' => 'Tel',
            'family' => 'Family',
            'name' => 'Name',
            'otch' => 'Otch',
            'doc1' => 'Doc 1',
            'doc2' => 'Doc 2',
            'doc3' => 'Doc 3',
            'vidr' => 'Vidr',
            'koef' => 'Koef',
            'avans' => 'Avans',
            'avans_date' => 'Avans Date',
            'obsl_date' => 'Obsl Date',
            'summa' => 'Summa',
            'date_v' => 'Date V',
            'summa_date' => 'Summa Date',
            'date_pol' => 'Date Pol',
            'technik' => 'Technik',
            'invent_tip' => 'Invent Tip',
            'vnes_izm' => 'Vnes Izm',
            'kto_prz' => 'Kto Prz',
            'data_kvz' => 'Data Kvz',
            'summa_techn' => 'Summa Techn',
            'date_koef' => 'Date Koef',
        ];
    }
    public function getCity(){
        return $this->hasOne(City::className(), ['c_id'=>'gorod']);
    }
    public function getStreet(){
        return $this->hasOne(Street::className(), ['s_id'=>'ulica']);
    }
}
