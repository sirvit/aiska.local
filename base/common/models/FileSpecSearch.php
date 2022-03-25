<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FileSpec;

/**
 * FileSpecSearch represents the model behind the search form of `common\models\FileSpec`.
 */
class FileSpecSearch extends FileSpec
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_file_spec', 'id_kontrakt', 'file_spec_kz'], 'integer'],
            [['file_spec_content', 'file_spec_name', 'file_spec_ds', 'file_spec_del'], 'safe'],
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
        $query = FileSpec::find();

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
            'id_file_spec' => $this->id_file_spec,
            'id_kontrakt' => $this->id_kontrakt,
            'file_spec_kz' => $this->file_spec_kz,
            'file_spec_ds' => $this->file_spec_ds,
        ]);

        $query->andFilterWhere(['like', 'file_spec_content', $this->file_spec_content])
            ->andFilterWhere(['like', 'file_spec_name', $this->file_spec_name])
            ->andFilterWhere(['like', 'file_spec_del', $this->file_spec_del]);

        return $dataProvider;
    }
}
