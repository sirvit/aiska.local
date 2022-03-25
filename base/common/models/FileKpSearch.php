<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FileKp;

/**
 * FileKpSearch represents the model behind the search form of `common\models\FileKp`.
 */
class FileKpSearch extends FileKp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_file_kp', 'id_proekt', 'file_kp_kz'], 'integer'],
            [['file_kp_content', 'file_kp_name', 'file_kp_ds', 'file_kp_del'], 'safe'],
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
        $query = FileKp::find();

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
            'id_file_kp' => $this->id_file_kp,
            'id_proekt' => $this->id_proekt,
            'file_kp_kz' => $this->file_kp_kz,
            'file_kp_ds' => $this->file_kp_ds,
        ]);

        $query->andFilterWhere(['like', 'file_kp_content', $this->file_kp_content])
            ->andFilterWhere(['like', 'file_kp_name', $this->file_kp_name]);
           // ->andFilterWhere(['like', 'file_kp_del', $this->file_kp_del]);
        $query->andWhere(['or', ['<>','file_kp_del', '1'], ['is', 'file_kp_del', new \yii\db\Expression('null')]]);

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
        $query = FileKp::find();

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
            'id_file_kp' => $this->id_file_kp,
            'id_proekt' => $id,
            'file_kp_kz' => $this->file_kp_kz,
            'file_kp_ds' => $this->file_kp_ds,
            'file_kp_del' => $this->file_kp_del,

        ]);

        $query->andFilterWhere(['like', 'file_kp_content', $this->file_kp_content])
            ->andFilterWhere(['like', 'file_kp_name', $this->file_kp_name]);
            //->andFilterWhere(['like', 'file_kp_del', $this->file_kp_del]);
//        $query->andWhere(['or', ['<>','file_kp_del', '1'], ['is', 'file_kp_del', new \yii\db\Expression('null')]]);
        $query->andWhere(['is', 'file_kp_del', new \yii\db\Expression('null')]);

        return $dataProvider;
    }

}
