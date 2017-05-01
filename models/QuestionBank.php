<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_bank".
 *
 * @property integer $question_bank_id
 * @property integer $question_type_id
 * @property integer $nos_option
 * @property string $question
 * @property string $description
 * @property integer $category_id
 * @property integer $level_id
 * @property integer $has_figure 
 * @property integer $max_mark 
 * @property integer $time_alloted
 * @property integer $no_time_served
 * @property integer $no_time_corrected
 * @property integer $no_time_incorrected
 * @property integer $no_time_unattempted
 */
class QuestionBank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_type_id', 'nos_option', 'category_id', 'level_id', 'has_figure', 'max_mark', 'time_alloted', 'no_time_served', 'no_time_corrected', 'no_time_incorrected', 'no_time_unattempted'], 'integer'],
            [['question', 'description'], 'required'],
            [['question', 'description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_bank_id' => 'Question Bank ID',
            'question_type_id' => 'Choose the type of Question',
            'nos_option' => 'Indicate the number of options/matches/questions',
            'question' => 'State the Question in brief',
            'description' => 'Describe the Question in more detail',
            'category_id' => 'Question is for which field?',
            'level_id' => 'Indicate the level of difficulty',
            'has_figure' => 'Does the question include figure?',
            'max_mark' => 'Maximum Marks',
            'time_alloted' => 'Time Alloted (sec)',
            'no_time_served' => 'No Time Served',
            'no_time_corrected' => 'No Time Corrected',
            'no_time_incorrected' => 'No Time Incorrected',
            'no_time_unattempted' => 'No Time Unattempted',
        ];
    }
}
