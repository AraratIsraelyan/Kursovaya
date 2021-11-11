<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Material;

/**
 * MaterialSearch represents the model behind the search form of `app\modules\admin\models\Material`.
 */
class MaterialSearch extends Material
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_material', 'id_type_job', 'kolvo', 'ispolzovano', 'stoimost'], 'integer'],
            [['material_name'], 'safe'],
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
        $query = Material::find()->joinWith(['typeJob', 'typeJob.brigad']);

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
            'id_material' => $this->id_material,
            'id_type_job' => $this->id_type_job,
            'kolvo' => $this->kolvo,
            'ispolzovano' => $this->ispolzovano,
            'stoimost' => $this->stoimost,
        ]);

        $query->andFilterWhere(['like', 'material_name', $this->material_name]);

        return $dataProvider;
    }
}
