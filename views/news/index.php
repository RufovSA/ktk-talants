<?php
/** @var yii\web\View $this */
/** @var app\models\News $posts */
/** @var yii\data\Pagination $pages */

use yii\bootstrap4\LinkPager;

$this->title = 'Новости';
?>
<div class="container" style="margin-top: 150px">
    <div class="container">
        <div class="header-h1">
            <h1><?= $this->title ?></h1>
        </div>
        <?php for ($i = 0; $i < count($posts); $i++): ?>
        <div class="row no-gutters position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img class="w-100" src="<?= $posts[$i]->img ?>" alt="<?= $posts[$i]->title ?>" style="height: 100%" />
            </div>
            <div class="col-md-6 position-static p-4 pl-md-0">
                <p><?= date('d.m.Y', $posts[$i]->createdate) ?></p>
                <h5 class="mt-0"><?= $posts[$i]->title ?></h5>
                <p><?= $posts[$i]->description ?></p>
                <a href="/news/<?= $posts[$i]->id ?>">
                    <?= \yii\helpers\Html::submitButton('Подробнее', ['class' => 'btn btn-primary']) ?>
                </a>
            </div>
        </div>
        <?php if ($i + 1 !== count($posts)): ?><hr /><?php endif ?>
        <?php endfor ?>
        <br />

        <?= LinkPager::widget([
            'pagination' => $pages,
            'options' => [
                  'class' => 'pagination justify-content-center'
            ]
        ]) ?>
    </div>
</div>
