<?php
/** @var yii\web\View $this */
/** @var app\models\News $post */

$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['/news']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="header-h1">
        <h1><?= $this->title ?></h1>
    </div>
    <img class="w-100" src="<?= $post->img ?>" alt="<?= $post->title ?>" style="height: 100%"/>
    <br />
    <br />
    <div>
        <?= $post->body ?>
    </div>
    <br />
    <br />
</div>