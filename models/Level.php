<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $lid
 * @property string $level_name
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_name'], 'required'],
            [['level_name'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lid' => 'Lid',
            'level_name' => 'Level Name',
        ];
    }
}
