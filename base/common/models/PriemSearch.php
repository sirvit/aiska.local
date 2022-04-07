<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Priem;

/**
 * PriemSearch represents the model behind the search form of `common\models\Priem`.
 */
class PriemSearch extends Priem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priem_id', 'gorod', 'ulica', 'd_u', 'doc1', 'doc2', 'doc3', 'vidr', 'technik', 'kto_prz', 'date_koef'], 'integer'],
            [['nomer', 'data_pz', 'dom', 'kvartira', 'tel', 'family', 'name', 'otch', 'avans_date', 'obsl_date', 'date_v', 'summa_date', 'date_pol', 'invent_tip', 'vnes_izm', 'data_kvz'], 'safe'],
            [['koef', 'avans', 'summa', 'summa_techn'], 'number'],
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
        $query = Priem::find();

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
            'priem_id' => $this->priem_id,
            'data_pz' => $this->data_pz,
            'gorod' => $this->gorod,
            'ulica' => $this->ulica,
            'd_u' => $this->d_u,
            'doc1' => $this->doc1,
            'doc2' => $this->doc2,
            'doc3' => $this->doc3,
            'vidr' => $this->vidr,
            'koef' => $this->koef,
            'avans' => $this->avans,
            'avans_date' => $this->avans_date,
            'obsl_date' => $this->obsl_date,
            'summa' => $this->summa,
            'date_v' => $this->date_v,
            'summa_date' => $this->summa_date,
            'date_pol' => $this->date_pol,
            'technik' => $this->technik,
            'kto_prz' => $this->kto_prz,
            'data_kvz' => $this->data_kvz,
            'summa_techn' => $this->summa_techn,
            'date_koef' => $this->date_koef,
        ]);

        $query->andFilterWhere(['like', 'nomer', $this->nomer])
            ->andFilterWhere(['like', 'dom', $this->dom])
            ->andFilterWhere(['like', 'kvartira', $this->kvartira])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'otch', $this->otch])
            ->andFilterWhere(['like', 'invent_tip', $this->invent_tip])
            ->andFilterWhere(['like', 'vnes_izm', $this->vnes_izm]);

        return $dataProvider;
    }
}
