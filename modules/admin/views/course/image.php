<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $product app\models\Course */
/* @var $form yii\widgets\ActiveForm */

$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $product->name, 'url' => ['view', 'id' => $product->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактирование изображения');
?>
<div class="container" style="margin-top: 100px;">
    <div class="header-h1">
        <h1>Редактирование изображение</h1>
    </div>
        <?php $form = ActiveForm::begin(); ?>
        <br>
        <?= $form->field($model, 'image')->fileInput(['class'=>'btn']) ?>

        <div class="form-group">
            <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>