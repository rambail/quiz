<?php

namespace app\models;


use Yii;
use yii\imagine\Image;


/**
 * This is the model class for table "image".
 *
 * @property integer $image_id
 * @property integer $question_bank_id
 * @property string $file_name 
 * @property integer $file_size
 */
class StoreImage extends \yii\db\ActiveRecord
{
    
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_bank_id', 'file_size'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif, pdf, bmp, jpeg, svg'],
            [['file_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'imageFile' => 'Upload the figure*',
            'image_id' => 'Image ID',
            'question_bank_id' => 'Question Bank ID',
            'file_name' => 'File Name', 
            'file_size' => 'File Size',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->save();
            $this->imageFile->saveAs('uploads/' . $this->file_name);
            Image::thumbnail('uploads/' . $this->file_name, 200, 200)->save('uploads/thumb/' . $this->file_name, ['quality' => 80]);
            return true;
        } else {
            return false;
        }
    }
}
