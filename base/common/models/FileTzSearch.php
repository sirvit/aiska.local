<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FileTz;

/**
 * FileTzSearch represents the model behind the search form of `common\models\FileTz`.
 */
class FileTzSearch extends FileTz
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_file_tz', 'id_kontrakt', 'file_tz_kz'], 'integer'],
            [['file_tz_content', 'file_tz_name', 'file_tz_ds', 'file_tz_del'], 'safe'],
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
        $query = FileTz::find();

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
            'id_file_tz' => $this->id_file_tz,
            'id_kontrakt' => $this->id_kontrakt,
            'file_tz_kz' => $this->file_tz_kz,
            'file_tz_ds' => $this->file_tz_ds,
        ]);

        $query->andFilterWhere(['like', 'file_tz_content', $this->file_tz_content])
            ->andFilterWhere(['like', 'file_tz_name', $this->file_tz_name])
            ->andFilterWhere(['like', 'file_tz_del', $this->file_tz_del]);

        return $dataProvider;
    }
}
