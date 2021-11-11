<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Zakazchiki;

/**
 * ZakazchikiSearch represents the model behind the search form of `app\modules\admin\models\Zakazchiki`.
 */
class ZakazchikiSearch extends Zakazchiki
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_zakazchika', 'id_object'], 'integer'],
            [['zak_name'], 'safe'],
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
        $query = Zakazchiki::find()->joinWith(['object']);

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
            'id_zakazchika' => $this->id_zakazchika,
            'id_object' => $this->id_object,
        ]);

        $query->andFilterWhere(['like', 'zak_name', $this->zak_name]);

        return $dataProvider;
    }
}
