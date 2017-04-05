<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_type".
 *
 * @property integer $qtype_id
 * @property string $question_type
 */
class QuestionType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_type'], 'required'],
            [['question_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qtype_id' => 'Qtype ID',
            'question_type' => 'Question Type',
        ];
    }
}
