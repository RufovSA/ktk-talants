<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/** @var \app\modules\lk\models\EditModel $model */

?>
<div class="container" style="margin-top: 100px;">
    <div class="header-h1">
        <h1>Редактирование профилиля</h1>
    </div>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="/lk/edit">Основная информация</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit/ava">Аватарка</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit/email">E-Mail</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit/password" >Пароль</a>
        </li>
    </ul>
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'fio') ?>
    <?= $form->field($model, 'specialty') ?>
    <?= $form->field($model, 'typeofeducation') ?>
    <?= $form->field($model, 'academic') ?>
    <?= $form->field($model, 'kurs') ?>
    <?= $form->field($model, 'year') ?>
    <?= $form->field($model, 'birthday') ?>
    <?= $form->field($model, 'gender')->dropdownList([
        1 => 'Мужской',
        'Женский'
    ], ['prompt' => '-- Укажите пол --']) ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'about')->textarea() ?>
    <?= $form->field($model, 'skills') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary w_100', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>
