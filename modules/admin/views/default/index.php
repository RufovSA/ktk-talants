<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Val.css">
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h1 align="center"> ДОБРО ПОЖАЛОВАТЬ!</h1>
<br>
<div class="col-md-2 btn-group-vertical container-fluid d-flex h-100 justify-content-center align-items-center p-0 " style="padding: 130px 0 0 0;">
    <button class="btn btn-primary" style=" min-height: 50px; width: 100%">
        <a class="nav-link" href="/admin/coursecategory">Категории</a>
    </button>
    <br>
    <button class="btn btn-primary" style=" min-height: 50px; width: 100%">
        <a class="nav-link" href="/admin/course">Курсы</a>
    </button>

    <br>
    <button class="btn btn-primary" style=" min-height: 50px; width: 100%">
        <a class="nav-link" href="/admin/news">Новости</a>
    </button>
    <br>

</div>
</div>
<div class="row justify-content-end">


</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('rs-main').style.marginTop = '150px';
        document.body.style.backgroundImage = 'url("/images/fon.png")';
        document.body.style.backgroundSize = 'cover';
    });
</script>