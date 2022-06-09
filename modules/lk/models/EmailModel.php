<?php

namespace app\modules\lk\models;

use app\models\Users;
use yii\base\Model;
use Yii;

class EmailModel extends Model
{
    public $old_email;
    public $new_email;

    public function rules()
    {
        return [
            [['old_email', 'new_email'], 'required'],
            [['old_email', 'new_email'], 'trim'],
            [['old_email', 'new_email'], 'email'],
            ['old_email', 'checkEmail'],
            ['new_email', 'unique', 'targetAttribute' => 'email', 'targetClass' => '\app\models\Users'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'old_email' => 'Старый email',
            'new_email' => 'Новый email',


        ];
    }
    public function checkEmail()
    {
        if ($this->old_email != Yii::$app->user->identity->email) {
            $this->addError('old_email', 'Данный E-Mail вам не принадлежит');
        }
    }

    public function reg()
    {
        $user = Users::findOne(Yii::$app->user->identity->id);
        $data = Yii::$app->request->post('EmailModel');
        $this->old_email = isset($data['old_email']) ? $data['old_email']: '';
        $this->new_email = isset($data['new_email']) ? $data['new_email']: '';
        if ($this->validate()) {
            $user->activate = md5(microtime() . uniqid());
            $user->save();
            Yii::$app->mailer->compose('new_email', [
                'fio' => $user->fio,
                'email' => $user->email,
                'new_email' => $this->new_email,
                'activate' => $user->activate,
            ])
                ->setTo($this->new_email)
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setSubject('Изменение адреса E-Mail')
                ->send();
            return true;
        }
        return false;
    }
}