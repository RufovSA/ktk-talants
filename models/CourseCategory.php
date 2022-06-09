<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_category".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $image
 *
 * @property Course[] $courses
 */
class CourseCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['image'], 'file', 'extensions'=>'jpg,png'],
            [['image'], 'default', 'value'=>'empty.jpg'],

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
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['category_id' => 'id']);
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        if($this->image)
            return '/uploads/' . $this->image;

    }

    public function deleteImage()
    {
        $imageUpload = new ImageUpload();
        $imageUpload->deleteOldImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }
}
