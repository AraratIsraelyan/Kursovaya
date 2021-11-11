<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Sotrudniki;

/**
 * SotrudnikiSearch represents the model behind the search form of `app\modules\admin\models\Sotrudniki`.
 */
class SotrudnikiSearch extends Sotrudniki
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sotrudnika', 'id_brigad', 'passport', 'id_dolzhnosti'], 'integer'],
            [['firstname', 'surname', 'date_birth', 'date_naim', 'phone_number'], 'safe'],
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
        $query = Sotrudniki::find()->joinWith(['dolzhnosti', 'brigad']);

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
            'id_sotrudnika' => $this->id_sotrudnika,
            'id_brigad' => $this->id_brigad,
            'date_birth' => $this->date_birth,
            'date_naim' => $this->date_naim,
            'passport' => $this->passport,
            'id_dolzhnosti' => $this->id_dolzhnosti,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
