<?php

namespace common\models;

use Yii;
//use common\models\User;

/**
 * This is the model class for table "proekt".
 *
 * @property int $id_proekt id
 * @property string $p_nazvanie nazvanie proekta
 * @property string $p_zapros data zaprosa
 * @property string $p_komer komercheskoe predlojenie
 * @property int $p_cproekt est li cherteji proekt
 * @property int $p_czavod est li cherteji zavod
 * @property string|null $p_pzakaz primechanie ot zakazchika
 * @property string|null $p_pispolnitel primechanie ot ispolnitelya
 * @property int $p_kz kto zavel proekt
 * @property string $p_dz kogda zaveli stroku
 * @property int|null $p_del udaleno ili net
 *
 * @property FileCp[] $fileCps
 * @property FileCz[] $fileCzs
 * @property Kontrakt[] $kontrakts
 */
class Proekt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proekt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['p_nazvanie', 'p_zapros', 'p_komer', 'p_kz', 'p_dz'], 'required', 'message' => 'Поле не может быть пустым'],
            [['p_nazvanie', 'p_zapros', 'p_komer', 'p_kz', 'p_dz'], 'required'],
            [['p_nazvanie', 'p_komer', 'p_pzakaz', 'p_pispolnitel'], 'string'],
            [['p_zapros', 'p_dz'], 'safe'],
            [['p_cproekt', 'p_czavod', 'p_kz', 'p_del'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proekt' => 'id',
            'p_nazvanie' => 'Название проекта',
            'p_zapros' => 'Дата запроса',
            'p_komer' => 'Коммерческое предложение',
            'p_cproekt' => 'Чертежи проекта',
            'p_czavod' => 'Чертежи завода',
            'p_pzakaz' => 'Примечание заказчика',
            'p_pispolnitel' => 'Примечание исполнителя',
            'p_kz' => 'kto zavel proekt',
            'p_dz' => 'kogda zaveli stroku',
            'p_del' => 'udaleno ili net',
        ];
    }

    public function getUsername($user_id){
        $user = new User();
        return $user::findOne(['id'=>$user_id]);
    }

    /**
     * Gets query for [[FileCps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFileCps()
    {
        return $this->hasMany(FileCp::className(), ['id_proekt' => 'id_proekt']);
    }

    /**
     * Gets query for [[FileCzs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFileCzs()
    {
        return $this->hasMany(FileCz::className(), ['id_proekt' => 'id_proekt']);
    }

    /**
     * Gets query for [[Kontrakts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKontrakts()
    {
        return $this->hasMany(Kontrakt::className(), ['id_proekt' => 'id_proekt']);
    }
    public function getExistsFile(){
        $result = 'Нет';
        if (FileKp::findOne(['id_proekt'=>$this->id_proekt])){
            $result='Есть';
        }
        return $result;
    }
}
