<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $gid
 * @property string $group_name
 * @property double $price
 * @property integer $valid_for_days
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_name', 'price'], 'required'],
            [['price'], 'number'],
            [['valid_for_days'], 'integer'],
            [['group_name'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'group_name' => 'Group Name',
            'price' => 'Price',
            'valid_for_days' => 'Valid For Days',
        ];
    }
}
