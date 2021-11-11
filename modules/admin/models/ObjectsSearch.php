<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Objects;

/**
 * ObjectsSearch represents the model behind the search form of `app\modules\admin\models\Objects`.
 */
class ObjectsSearch extends Objects
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_name', 'address'], 'safe'],
            [['id_object', 'id_uprav'], 'integer'],
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
        $query = Objects::find()->joinWith(['uprav']);

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
            'id_object' => $this->id_object,
            'id_uprav' => $this->id_uprav,
        ]);

        $query->andFilterWhere(['like', 'object_name', $this->object_name])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
