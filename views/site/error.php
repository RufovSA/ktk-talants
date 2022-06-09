<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container" style="margin-top: 100px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <a href="/">
        <?= Html::submitButton('На главную', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style' => 'width: 100%']) ?>
    </a>

</div>
