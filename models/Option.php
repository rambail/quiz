<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property integer $option_id
 * @property integer $question_bank_id
 * @property string $question_option
 * @property double $score
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_bank_id', 'question_option'], 'required'],
            [['question_bank_id'], 'integer'],
            [['score'], 'number'],
            [['question_option'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'question_bank_id' => 'Question Bank ID',
            'question_option' => 'Question Option',
            'score' => 'Score',
        ];
    }
}
