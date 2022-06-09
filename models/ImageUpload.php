<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;



    public function attributeLabels()
    {
        return [
            'image' => 'Фото',

        ];
    }

    public function rules()
    {
        return [
            [['image'],'required'],
            [['image'],'file', 'extensions' => 'jpg,png,mp4,avi,gif'],
        ];
    }

    public function uploadFile(UploadedFile $file, $oldFile){
        $this->image = $file;
        if($this->fileExist($oldFile) && !empty($oldFile))
            $this->deleteOldImage($oldFile);

        $filename = uniqid($file->baseName) . '.' . $file->extension;

        $file->saveAs($this->getUploadsFolder().$filename);

        return $filename;
    }

    private function getUploadsFolder(){
        return Yii::getAlias('@web') . 'uploads/';
    }

    public function fileExist($oldFile){
        return file_exists($this->getUploadsFolder() . $oldFile);
    }

    public function deleteOldImage($oldFile){
        if($oldFile != 'empty.jpg' && $this->fileExist($oldFile))
            unlink($this->getUploadsFolder() . $oldFile);
    }
}