<?php

namespace app\models;

use yii\base\Exception;
use yii\base\Model;
use Yii;

class RegForm extends Model
{
    public $fio;
    public $email;
    public $password;
    public $password2;
    public $check;


    public function rules()
    {
        return [
            [['fio', 'email', 'password', 'password2'], 'required'],
            [['fio', 'email', 'password', 'password2'], 'trim'],
            ['password2', 'compare', 'compareAttribute' => 'password'],
            ['check', 'compare', 'compareValue' => true, 'message' => Yii::t('reg', 'You have not accepted the agreement')],
            ['fio', 'match', 'pattern' => '/^([а-яa-zё]+-?[а-яa-zё]+)( [а-яa-zё]+-?[а-яa-zё]+){1,2}$/Diu'],
            ['fio', 'string', 'length' => [2, 100]],
            ['password', 'string', 'length' => [6, 32]],
            ['email', 'email'],
            ['check', 'boolean'],
            ['email', 'unique', 'targetAttribute' => 'email', 'targetClass' => '\app\models\Users'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fio' => Yii::t('reg', 'FIO'),
            'email' => Yii::t('reg', 'E-Mail'),
            'password' => Yii::t('reg', 'Password'),
            'password2' => Yii::t('reg', 'Repeat the password'),
            'check' => Yii::t('reg', 'I accept the terms of the User Agreement and give my consent to the processing of my personal information on the terms defined by the Privacy Policy.'),
        ];
    }

    /**
     * @throws Exception
     */
    public function reg()
    {
        $user = new Users();
        $user->fio = $this->fio;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->role = 0;
        $user->photo = '0';
        $user->cover = '0';
        $user->rank = 0;
/*      $user->$specialty= 0;
        $user->$typeofeducation= 0;
        $user->$kurs= 0;
        $user->$academic= 0;
        $user->$year= 0;
        $user->$birthday= 0;
        $user->$gender= 0;
        $user->$phone= 0;
        $user->$about= 0;
        $user->$skills= 0;*/
        $user->activate = md5(microtime() . uniqid());
        $user->createDate = time();
        $save = $user->save();

        if ($save) {
            Yii::$app->mailer->compose('reg', [
                'fio' => $user->fio,
                'email' => $user->email,
                'activate' => $user->activate,
            ])
                ->setTo($this->email)
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setSubject('Завершение регистрации')
                ->send();
        }
        return $save;
    }
}