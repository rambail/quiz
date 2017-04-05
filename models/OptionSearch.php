<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Option;

/**
 * OptionSearch represents the model behind the search form about `app\models\Option`.
 */
class OptionSearch extends Option
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_id', 'qbank_id'], 'integer'],
            [['q_option', 'q_option_match'], 'safe'],
            [['score'], 'number'],
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
        $query = Option::find();

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
            'option_id' => $this->option_id,
            'qbank_id' => $this->qbank_id,
            'score' => $this->score,
        ]);

        $query->andFilterWhere(['like', 'q_option', $this->q_option])
            ->andFilterWhere(['like', 'q_option_match', $this->q_option_match]);

        return $dataProvider;
    }
}
