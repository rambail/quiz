<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuestionBank;

/**
 * QuestionBankSearch represents the model behind the search form about `app\models\QuestionBank`.
 */
class QuestionBankSearch extends QuestionBank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_bank_id', 'question_type_id', 'nos_option', 'category_id', 'level_id', 'has_figure', 'max_mark', 'no_time_served', 'no_time_corrected', 'no_time_incorrected', 'no_time_unattempted'], 'integer'],
            [['question', 'description'], 'safe'],
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
        $query = QuestionBank::find();

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
            'question_bank_id' => $this->question_bank_id,
            'question_type_id' => $this->question_type_id,
            'nos_option' => $this->nos_option,
            'category_id' => $this->category_id,
            'level_id' => $this->level_id,
            'has_figure' => $this->has_figure, 
            'max_mark' => $this->max_mark, 
            'no_time_served' => $this->no_time_served,
            'no_time_corrected' => $this->no_time_corrected,
            'no_time_incorrected' => $this->no_time_incorrected,
            'no_time_unattempted' => $this->no_time_unattempted,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
