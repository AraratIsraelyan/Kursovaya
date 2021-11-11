<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Dolzhnosti;

/**
 * DolzhnostiSearch represents the model behind the search form of `app\modules\admin\models\Dolzhnosti`.
 */
class DolzhnostiSearch extends Dolzhnosti
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dolzhnosti'], 'integer'],
            [['dolzhnost_name', 'specialnost', 'atribut1'], 'safe'],
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
        $query = Dolzhnosti::find();

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
            'id_dolzhnosti' => $this->id_dolzhnosti,
        ]);

        $query->andFilterWhere(['like', 'dolzhnost_name', $this->dolzhnost_name])
            ->andFilterWhere(['like', 'specialnost', $this->specialnost])
            ->andFilterWhere(['like', 'atribut1', $this->atribut1]);

        return $dataProvider;
    }
}
