<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourseCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form container">
    <div class="row">

        <?php $form = ActiveForm::begin(); ?>
        <br>
        <?= $form->field($model, 'image')->fileInput(['class'=>'btn']) ?>

        <div class="form-group">
            <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>


</div>