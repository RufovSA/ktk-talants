<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */
/* @var string $fio */
/* @var string $email */
/* @var string $activate */

$url = Url::home('http') . 'activate?email=' . $email . '&key=' . $activate;
?>
<p>Здраствуйте, <?= $fio ?></p>
<p>Для завершение регистрации перейдите по ссылке:</p>
<?= Html::a($url, $url) ?>
