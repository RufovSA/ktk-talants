<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fio
 * @property string $email
 * @property string $password
 * @property int $role
 * @property string $photo
 * @property string $cover
 * @property int $createDate
 * @property int $rank
 * @property string $activate
 * @property string|null $specialty
 * @property string|null $typeofeducation
 * @property int|null $kurs
 * @property string|null $academic
 * @property int|null $year
 * @property string|null $birthday
 * @property int|null $gender
 * @property string|null $phone
 * @property string|null $about
 * @property string|null $skills
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'password', 'role', 'photo', 'cover', 'createDate', 'rank', 'activate'], 'required'],
            [['role', 'createDate', 'rank', 'kurs', 'year', 'gender'], 'integer'],
            [['birthday'], 'safe'],
            [['about', 'skills'], 'string'],
            [['fio', 'email', 'photo', 'cover', 'specialty', 'typeofeducation', 'academic', 'phone'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
            [['activate'], 'string', 'max' => 32],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fio' => Yii::t('app', 'Fio'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
            'photo' => Yii::t('app', 'Photo'),
            'cover' => Yii::t('app', 'Cover'),
            'createDate' => Yii::t('app', 'Create Date'),
            'rank' => Yii::t('app', 'Rank'),
            'activate' => Yii::t('app', 'Activate'),
            'specialty' => Yii::t('app', 'Specialty'),
            'typeofeducation' => Yii::t('app', 'Typeofeducation'),
            'kurs' => Yii::t('app', 'Kurs'),
            'academic' => Yii::t('app', 'Academic'),
            'year' => Yii::t('app', 'Year'),
            'birthday' => Yii::t('app', 'Birthday'),
            'gender' => Yii::t('app', 'Gender'),
            'phone' => Yii::t('app', 'Phone'),
            'about' => Yii::t('app', 'About'),
            'skills' => Yii::t('app', 'Skills'),
        ];
    }
}