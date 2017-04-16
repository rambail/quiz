<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "essay".
 *
 * @property integer $essay_id
 * @property integer $question_bank_id
 * @property string $essay_text
 */
class Essay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'essay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_bank_id', 'essay_text'], 'required'],
            [['question_bank_id'], 'integer'],
            [['essay_text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'essay_id' => 'Essay ID',
            'question_bank_id' => 'Question Bank ID',
            'essay_text' => 'Essay Text',
        ];
    }
}
