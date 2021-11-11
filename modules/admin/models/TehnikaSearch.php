<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Tehnika;

/**
 * TehnikaSearch represents the model behind the search form of `app\modules\admin\models\Tehnika`.
 */
class TehnikaSearch extends Tehnika
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tehnika', 'id_object', 'kolichestvo', 'id_type_job', 'id_uprav'], 'integer'],
            [['tehnic_name'], 'safe'],
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
        $query = Tehnika::find()->joinWith(['uprav', 'typeJob']);

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
            'id_tehnika' => $this->id_tehnika,
            'id_object' => $this->id_object,
            'kolichestvo' => $this->kolichestvo,
            'id_type_job' => $this->id_type_job,
            'id_uprav' => $this->id_uprav,
        ]);

        $query->andFilterWhere(['like', 'tehnic_name', $this->tehnic_name]);

        return $dataProvider;
    }
}
