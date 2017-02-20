<?php

namespace lilhamma\store\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lilhamma\store\models\Remain;

/**
 * RemainSearch represents the model behind the search form about `\lilhamma\store\models\Remain`.
 */
class RemainSearch extends Remain
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'element_id', 'store_id', 'amount'], 'integer'],
            [['comment'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Remain::find();

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
            'id' => $this->id,
            'element_id' => $this->element_id,
            'store_id' => $this->store_id,
            'amount' => $this->amount,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
