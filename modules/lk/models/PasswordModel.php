<?php

namespace app\modules\lk\models;

use app\models\Users;
use yii\base\Model;
use Yii;

class PasswordModel extends Model
{
    public $old_password;
    public $new_password;
    public $new_password2;

    public function rules()
    {
        return [
            [['old_password', 'new_password', 'new_password2'], 'required'],
            [['old_password', 'new_password', 'new_password2'], 'trim'],
            ['old_password', 'validPass'],
            ['new_password', 'string', 'length' => [6, 32]],
            ['new_password2', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'old_password' => 'Старый пароль',
            'new_password' => 'Новый пароль',
            'new_password2' => 'Повторить пароль',
        ];
    }
    public function validPass()
    {
        if (!Yii::$app->security->validatePassword($this->old_password, Yii::$app->user->identity->password)) {
            $this->addError('old_password', 'Вы указали неверный старый пароль');
        }
    }

    public function reg()
    {
        $user = Users::findOne(Yii::$app->user->identity->id);
        $data = Yii::$app->request->post('PasswordModel');
        $this->old_password = isset($data['old_password']) ? $data['old_password']: '';
        $this->new_password = isset($data['new_password']) ? $data['new_password']: '';
        $this->new_password2 = isset($data['new_password2']) ? $data['new_password2']: '';
        if ($this->validate()) {
            $user->password = Yii::$app->security->generatePasswordHash($this->new_password);
            return $user->save(false);
        }
        return false;
    }
}