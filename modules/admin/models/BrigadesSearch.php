<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Brigades;

/**
 * BrigadesSearch represents the model behind the search form of `app\modules\admin\models\Brigades`.
 */
class BrigadesSearch extends Brigades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_brigad', 'id_uprav', 'id_object', 'id_brigadir'], 'integer'],
            [['brigad_name'], 'safe'],
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
        $query = Brigades::find();

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
            'id_brigad' => $this->id_brigad,
            'id_uprav' => $this->id_uprav,
            'id_object' => $this->id_object,
            'id_brigadir' => $this->id_brigadir,
        ]);

        $query->andFilterWhere(['like', 'brigad_name', $this->brigad_name]);

        return $dataProvider;
    }
}
