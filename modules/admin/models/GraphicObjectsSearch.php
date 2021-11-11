<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\GraphicObjects;

/**
 * GraphicObjectsSearch represents the model behind the search form of `app\modules\admin\models\GraphicObjects`.
 */
class GraphicObjectsSearch extends GraphicObjects
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_job', 'id_object', 'id_brigad'], 'integer'],
            [['date_nachalo', 'date_end', 'job_name', 'date_cdachi'], 'safe'],
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
        $query = GraphicObjects::find()->joinWith(['object', 'brigad']);

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
            'id_type_job' => $this->id_type_job,
            'id_object' => $this->id_object,
            'date_nachalo' => $this->date_nachalo,
            'date_end' => $this->date_end,
            'date_cdachi' => $this->date_cdachi,
            'id_brigad' => $this->id_brigad,
        ]);

        $query->andFilterWhere(['like', 'job_name', $this->job_name]);

        return $dataProvider;
    }
}
