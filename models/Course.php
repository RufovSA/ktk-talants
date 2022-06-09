<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $file
 * @property string|null $cover
 * @property int $category_id
 *
 * @property CourseCategory $category
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['name', 'file', 'cover'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['cover'], 'default', 'value'=>'empty.jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'file' => Yii::t('app', 'File'),
            'cover' => Yii::t('app', 'Cover'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CourseCategory::className(), ['id' => 'category_id']);
    }

    public function saveImage($filename)
    {
        $this->cover = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        if($this->cover)
            return '/uploads/' . $this->cover;

    }

    public function deleteImage()
    {
        $imageUpload = new ImageUpload();
        $imageUpload->deleteOldImage($this->cover);
    }

    public function saveFile($filename)
    {
        $this->file = $filename;
        return $this->save(false);
    }

    public function getFile()
    {
        if($this->file)
            return '/uploads/' . $this->file;

    }

    public function deleteFile()
    {
        $imageUpload = new ImageUpload();
        $imageUpload->deleteOldImage($this->file);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

}
