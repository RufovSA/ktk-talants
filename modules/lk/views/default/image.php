<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */
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
            <a class="nav-link active" href="/lk/edit/ava">Аватарка</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit/email">E-Mail</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lk/edit/password">Пароль</a>
        </li>
    </ul>

    <?php $form = ActiveForm::begin(); ?>
    <br>
    <?= $form->field($model, 'image')->fileInput(['class' => 'btn']) ?>

    <div class="form-group">
        <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
