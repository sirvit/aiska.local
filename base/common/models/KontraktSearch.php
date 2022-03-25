<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kontrakt;

/**
 * KontraktSearch represents the model behind the search form of `common\models\Kontrakt`.
 */
class KontraktSearch extends Kontrakt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kontrakt', 'id_proekt', 'k_spec', 'k_oplata', 'k_kz', 'k_del'], 'integer'],
            [['k_summa'], 'number'],
            [['k_valuta', 'k_zn', 'k_d_okon', 'k_d_post', 'k_d_pp', 'k_ds'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kontrakt::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_kontrakt' => $this->id_kontrakt,
            'id_proekt' => $this->id_proekt,
            'k_summa' => $this->k_summa,
            'k_spec' => $this->k_spec,
            'k_d_okon' => $this->k_d_okon,
            'k_d_post' => $this->k_d_post,
            'k_d_pp' => $this->k_d_pp,
            'k_oplata' => $this->k_oplata,
            'k_kz' => $this->k_kz,
            'k_ds' => $this->k_ds,
            'k_del' => $this->k_del,
        ]);

        $query->andFilterWhere(['like', 'k_valuta', $this->k_valuta])
            ->andFilterWhere(['like', 'k_zn', $this->k_zn]);

        return $dataProvider;
    }
}
