<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Proekt;

/**
 * ProektSearch represents the model behind the search form of `common\models\Proekt`.
 */
class ProektSearch extends Proekt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_proekt', 'p_cproekt', 'p_czavod', 'p_kz', 'p_del'], 'integer'],
            [['p_nazvanie', 'p_zapros', 'p_komer', 'p_pzakaz', 'p_pispolnitel', 'p_dz'], 'safe'],
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
        $query = Proekt::find();

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
            'id_proekt' => $this->id_proekt,
            'p_zapros' => $this->p_zapros,
            'p_cproekt' => $this->p_cproekt,
            'p_czavod' => $this->p_czavod,
            'p_kz' => $this->p_kz,
            'p_dz' => $this->p_dz,
            'p_del' => $this->p_del,
        ]);

        $query->andFilterWhere(['like', 'p_nazvanie', $this->p_nazvanie])
            ->andFilterWhere(['like', 'p_komer', $this->p_komer])
            ->andFilterWhere(['like', 'p_pzakaz', $this->p_pzakaz])
            ->andFilterWhere(['like', 'p_pispolnitel', $this->p_pispolnitel]);
        $query->andWhere(['or', ['<>','p_del', '1'], ['is', 'p_del', new \yii\db\Expression('null')]]);
        return $dataProvider;
    }
}
