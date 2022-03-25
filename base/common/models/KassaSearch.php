<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kassa;

/**
 * KassaSearch represents the model behind the search form of `common\models\Kassa`.
 */
class KassaSearch extends Kassa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kassa', 'id_kontrakt', 'kassa_kz'], 'integer'],
            [['kassa_n_doc', 'kassa_d_doc', 'kassa_d_summa', 'kassa_ds', 'kassa_del'], 'safe'],
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
        $query = Kassa::find();

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
            'id_kassa' => $this->id_kassa,
            'id_kontrakt' => $this->id_kontrakt,
            'kassa_d_doc' => $this->kassa_d_doc,
            'kassa_kz' => $this->kassa_kz,
            'kassa_ds' => $this->kassa_ds,
        ]);

        $query->andFilterWhere(['like', 'kassa_n_doc', $this->kassa_n_doc])
            ->andFilterWhere(['like', 'kassa_d_summa', $this->kassa_d_summa])
            ->andFilterWhere(['like', 'kassa_del', $this->kassa_del]);

        return $dataProvider;
    }
}
