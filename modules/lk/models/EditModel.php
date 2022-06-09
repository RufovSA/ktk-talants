<?php

namespace app\modules\lk\models;

use app\models\Users;
use yii\base\Model;
use Yii;

class EditModel extends Model
{
    public $fio;
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

    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'specialty' => 'Специальность',
            'typeofeducation' => 'Тип образования',
            'kurs' => 'Курс',
            'academic' => 'Учебное заведение',
            'year' => 'Год',
            'birthday' => 'Дата рождения',
            'gender' => 'Пол',
            'phone' => 'Телефон',
            'about' => 'Обо мне',
            'skills' => 'Навыки',

        ];
    }

    public function rules()
    {
        return [
            [['fio',  'specialty', 'typeofeducation', 'kurs', 'academic', 'year', 'birthday', 'gender', 'phone', 'about', 'skills'], 'required'],
            [['fio',  'specialty', 'typeofeducation', 'kurs', 'academic', 'year', 'birthday', 'gender', 'phone', 'about', 'skills'], 'trim'],
            ['fio', 'match', 'pattern' => '/^([а-яa-zё]+-?[а-яa-zё]+)( [а-яa-zё]+-?[а-яa-zё]+){1,2}$/Diu'],
            ['fio', 'string', 'length' => [2, 100]],
        ];
    }

    public function reg()
    {
        $data = Yii::$app->request->post('EditModel');
        $this->fio = isset($data['fio']) ? $data['fio']: '';
        $this->specialty = isset($data['specialty']) ? $data['specialty']: '';
        $this->typeofeducation = isset($data['typeofeducation']) ? $data['typeofeducation']: '';
        $this->kurs = isset($data['kurs']) ? $data['kurs']: '';
        $this->academic = isset($data['academic']) ? $data['academic']: '';
        $this->year = isset($data['year']) ? $data['year']: '';
        $this->birthday = isset($data['birthday']) ? $data['birthday']: '';
        $this->gender = isset($data['gender']) ? $data['gender']: '';
        $this->phone = isset($data['phone']) ? $data['phone']: '';
        $this->about = isset($data['about']) ? $data['about']: '';
        $this->skills = isset($data['skills']) ? $data['skills']: '';

        if ($this->validate()) {
            $user = Users::findOne(Yii::$app->user->identity->id);
            $user->fio = $this->fio;
            $user->specialty = $this->specialty;
            $user->typeofeducation = $this->typeofeducation;
            $user->kurs = $this->kurs;
            $user->academic = $this->academic;
            $user->year = $this->year;
            $user->birthday = $this->birthday;
            $user->gender = $this->gender;
            $user->phone = $this->phone;
            $user->about = $this->about;
            $user->skills = $this->skills;
            return $user->save();
        }
        return false;
    }
}