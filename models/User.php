<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $fio;
    public $email;
    public $role;
    public $photo;
    public $cover;
    public $password;
    public $createDate;
    public $rank;
    public $activate;
    public $specialty;
    public $typeofeducation;
    public $kurs;
    public $academic;
    public $year;
    public $birthday;
    public $gender;
    public $phone;
    public $about;
    public $skills;
    public $auth_key;
    public $access_token;

    /**
     * {@inheritdoc}
     * @param $id
     * @return Users|\yii\web\IdentityInterface|null
     */
    public static function findIdentity($id)
    {
        $user = Users::find()->where(['id' => $id])->asArray()->one();
        if ($user) return new static($user);
        return null;
    }

    /**
     * {@inheritdoc}
     * @param $token
     * @param $type
     * @return Users|\yii\web\IdentityInterface|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = Users::find()->where(['access_token' => $token])->asArray()->one();
        if ($user) return new static($user);
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return Users|null
     */
    public static function findByUsername($username)
    {
        $user = Users::find()->where(['email' => $username])->asArray()->one();
        if ($user) return new static($user);
        return null;
    }

    /**
     * {@inheritdoc}
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     * @return string|null
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     * @param $auth_key
     * @return bool
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }
}
