<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FileCz;

/**
 * FileCzSearch represents the model behind the search form of `common\models\FileCz`.
 */
class FileCzSearch extends FileCz
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_file_cz', 'id_proekt', 'file_cz_kz'], 'integer'],
            [['file_cz_content', 'file_cz_name', 'file_cz_ds', 'file_cz_del'], 'safe'],
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
        $query = FileCz::find();

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
            'id_file_cz' => $this->id_file_cz,
            'id_proekt' => $this->id_proekt,
            'file_cz_kz' => $this->file_cz_kz,
            'file_cz_ds' => $this->file_cz_ds,
        ]);

        $query->andFilterWhere(['like', 'file_cz_content', $this->file_cz_content])
            ->andFilterWhere(['like', 'file_cz_name', $this->file_cz_name]);
            //->andFilterWhere(['like', 'file_cz_del', $this->file_cz_del]);
        $query->andWhere(['or', ['<>','file_cz_del', '1'], ['is', 'file_cz_del', new \yii\db\Expression('null')]]);


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
        $query = FileCz::find();

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
            'id_file_cz' => $this->id_file_cz,
            'id_proekt' => $id,
            'file_cz_kz' => $this->file_cz_kz,
            'file_cz_ds' => $this->file_cz_ds,
            'file_cz_del' => $this->file_cz_del,

        ]);

        $query->andFilterWhere(['like', 'file_cz_content', $this->file_cz_content])
            ->andFilterWhere(['like', 'file_cz_name', $this->file_cz_name]);
        //->andFilterWhere(['like', 'file_kp_del', $this->file_kp_del]);
//        $query->andWhere(['or', ['<>','file_kp_del', '1'], ['is', 'file_kp_del', new \yii\db\Expression('null')]]);
        $query->andWhere(['is', 'file_cz_del', new \yii\db\Expression('null')]);

        return $dataProvider;
    }

}
