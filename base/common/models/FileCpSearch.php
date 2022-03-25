<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FileCp;

/**
 * FileCpSearch represents the model behind the search form of `common\models\FileCp`.
 */
class FileCpSearch extends FileCp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_file_cp', 'id_proekt', 'file_cp_kz'], 'integer'],
            [['file_cp_content', 'file_cp_name', 'file_cp_ds', 'file_cp_del'], 'safe'],
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
        $query = FileCp::find();

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
            'id_file_cp' => $this->id_file_cp,
            'id_proekt' => $this->id_proekt,
            'file_cp_kz' => $this->file_cp_kz,
            'file_cp_ds' => $this->file_cp_ds,
        ]);

        $query->andFilterWhere(['like', 'file_cp_content', $this->file_cp_content])
            ->andFilterWhere(['like', 'file_cp_name', $this->file_cp_name]);
           // ->andFilterWhere(['like', 'file_cp_del', $this->file_cp_del]);
        $query->andWhere(['or', ['<>','file_cp_del', '1'], ['is', 'file_cp_del', new \yii\db\Expression('null')]]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied one id
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchproekt($id)
    {
        $query = FileCp::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_file_cp' => $this->id_file_cp,
            'id_proekt' => $id,
            'file_cp_kz' => $this->file_cp_kz,
            'file_cp_ds' => $this->file_cp_ds,
            'file_cp_del' => $this->file_cp_del,

        ]);

        $query->andFilterWhere(['like', 'file_cp_content', $this->file_cp_content])
            ->andFilterWhere(['like', 'file_cp_name', $this->file_cp_name]);
        //->andFilterWhere(['like', 'file_cp_del', $this->file_cp_del]);
//        $query->andWhere(['or', ['<>','file_cp_del', '1'], ['is', 'file_cp_del', new \yii\db\Expression('null')]]);
        $query->andWhere(['is', 'file_cp_del', new \yii\db\Expression('null')]);

        return $dataProvider;
    }

}
