<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "match_column".
 *
 * @property integer $match_column_id
 * @property integer $question_bank_id
 * @property string $column
 * @property string $column_match
 * @property double $score
 */
class MatchColumn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match_column';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_bank_id', 'column', 'column_match'], 'required'],
            [['question_bank_id'], 'integer'],
            [['score'], 'number'],
            [['column', 'column_match'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'match_column_id' => 'Match Column ID',
            'question_bank_id' => 'Question Bank ID',
            'column' => 'Column',
            'column_match' => 'Column Match',
            'score' => 'Score',
        ];
    }
}
