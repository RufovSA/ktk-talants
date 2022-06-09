<?php

/** @var yii\web\View $this */

const PAGE_INDEX = true;
const PAGE_FOOTER = true;

$this->title = 'My Yii Application';

?>
<section id="banner_main" class="rs-banner-main-color">
    <div class="container color-while">
        <div class="row">
            <div id="rs_banner_animation" class="col-md-6"></div>
            <div class="col-md-6" style="margin: auto">
                <h1>Обучающая платформа для талантливой молодежи!</h1>
            </div>
        </div>
    </div>
    <div style="position: absolute; bottom: 0">
        <img src="images/bg.svg"/>
    </div>

</section>

<section class="container" style="margin-top: 100px;">
    <div class="header-h1">
        <h1>Почему Мы?</h1>
    </div>
    <div class="row">
        <div class="col-md-6 text-center mb-5">
            <img src="images/icons/courses.png" alt="Курсы" style="width: 220px;"/>
            <br/><br/>
            <h3>Курсы</h3>
            <p>Курсы по топовым современным программам.</p>
        </div>
        <div class="col-md-6 text-center mb-5">
            <img src="images/icons/certificates.png" alt="Сертификаты" style="width: 220px;"/>
            <br/><br/>
            <h3>Сертификаты</h3>
            <p>После прохождения курса, выдается сертификат</p>
        </div>
        <div class="col-md-6 text-center mb-5">
            <img src="images/icons/contests.png" alt="Конкурсы" style="width: 200px;"/>
            <br/><br/>
            <h3>Конкурсы</h3>
            <p>Всероссийские и Национальные конкурсы. Обучение, сопровождение, подготовка </p>
        </div>
        <div class="col-md-6 text-center mb-5">
            <img src="images/icons/workshops.png" alt="Мастерские WSR" style="width: 220px;"/>
            <br/><br/>
            <h3>Мастерские WSR</h3>
            <p>Современные мастерские по стандартам Worldskills для подготовки кадров IT сфере.</p>
        </div>
    </div>
</section>
<section class="text-center">
    <img src="images/icons/map.png" alt="Как нас найти" style="width: 220px;"/>
    <br/><br/>
    <h3>Как нас найти</h3>
    <p>Микрорайон "Тайфун"<br/>
        Маршрутный автобус №77<br/>
        Остановка "Лицей №22" (конечная)</p>
</section>