<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/** @var \app\modules\lk\models\PasswordModel $model */

?>
<div class="container" style="margin-top: 100px;">
    <div class="header-h1">
        <h1>Редактирование профилиля</h1>
    </div>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit">Основная информация</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit/ava">Аватарка</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit/email">E-Mail</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/lk/edit/password" >Пароль</a>
        </li>
    </ul>
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'old_password')->passwordInput() ?>
    <?= $form->field($model, 'new_password')->passwordInput() ?>
    <?= $form->field($model, 'new_password2')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary w_100', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>
