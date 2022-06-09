<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$url = explode('/', Yii::$app->request->getPathInfo());

$regModel = new \app\models\RegForm();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<div class="spin-wrapper">
    <video no-controls autoplay loop playsinline muted poster="/images/loader.png"
           style="position: absolute;top: 50%;left: 50%;margin-top: -200px;margin-left: -200px;z-index: 1000">
        <source type="video/mp4" src="/images/loader.mp4"/>
        <img src="/images/loader.png" alt="Загрузка..."/>
    </video>
</div>

<div id="page_wrapper">
    <div id="page_body">
        <nav id="rs_navbar" class="navbar navbar-expand-md navbar-light p-0 rs-transition-menu fixed-top bg-white">
            <div class="container-fluid px-4">
                <a class="navbar-brand mr-4" href="/" style="padding-top: 5px; padding-bottom: 5px;">
                    <!-- Logo -->
                    <img src="/images/logo.png" alt="Бизнес инкубатор - КТК"/>
                    <!-- ./Logo -->
                </a>
                <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item<?php if (Yii::$app->request->getPathInfo() == ''): ?> active<?php endif ?>">
                            <a class="nav-link" href="/">Главная</a>
                        </li>
                        <li class="nav-item<?php if ($url[0] == 'news'): ?> active<?php endif ?>">
                            <a class="nav-link" href="/news">Новости</a>
                        </li>
                        <li class="nav-item<?php if ($url[0] == 'contests'): ?> active<?php endif ?>"><a class="nav-link" href="#" id="navbarDropdown3" role="button"
                                                                                                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Конкурсы<span
                                    class="fa fa-angle-down"></span></a>
                            <div class="dropdown-menu" id="dropdown-menu3" aria-labelledby="navbarDropdown3">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row d-flex tab">
                                                <div class="rs-icon-menu text-center">
                                                    <img src="/images/courses/bp.png" alt="Большая Перемена"/>
                                                </div>
                                                <div class="d-flex flex-column"><a class="dropdown-item" href="/contests/bp">
                                                        <h6 class="mb-0">Большая Перемена</h6> <small
                                                            class="text-muted">Opinions,
                                                            complaints</small>
                                                    </a></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row d-flex tab">
                                                <div class="rs-icon-menu text-center">
                                                    <img src="/images/courses/wsr.png" alt="WordSkills"/>
                                                </div>
                                                <div class="d-flex flex-column"><a class="dropdown-item" href="/contests/wsr">
                                                        <h6 class="mb-0">WordSkills</h6> <small class="text-muted">Qs
                                                            and
                                                            answers</small>
                                                    </a></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row d-flex tab">
                                                <div class="rs-icon-menu text-center">
                                                    <img src="/images/courses/bp.png" alt="Твой ход"/>
                                                </div>
                                                <div class="d-flex flex-column"><a class="dropdown-item"
                                                                                   href="/contests/xod">
                                                        <h6 class="mb-0">Твой ход</h6> <small class="text-muted">Opinions,
                                                            complaints</small>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item<?php if ($url[0] == 'courses'): ?> active<?php endif ?>">
                            <a class="nav-link" href="/courses">Курсы</a>
                        </li>
                        <li class="nav-item<?php if ($url[0] == 'talents'): ?> active<?php endif ?>">
                            <a class="nav-link" href="/talents">Таланты</a>
                        </li>
                        <li class="nav-item<?php if ($url[0] == 'contact'): ?> active<?php endif ?>">
                            <a class="nav-link" href="/contact">Контакты</a>
                        </li>

                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="button" data-toggle="modal"
                                data-target="#modal_login">Войти
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <main id="rs-main">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </main>
    </div>

    <?php if (defined('PAGE_FOOTER') && PAGE_FOOTER): ?>
        <footer id="footer">
            <img src="/images/footer.png"/>
            <div class="color-while" style="background-color: #000b2c;">
                <div class="text-center"><a href="https://ktk40.ru" target="_blank">ГАПОУ КО "КТК"</a> &copy; <?= date('Y') ?>. Все
                    права защищены
                </div>
            </div>
        </footer>
    <?php endif ?>
</div>

<div id="modal_login" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rs-box-shadow" style="border: none;border-radius: 20px;">
            <div class="modal-body" style="padding: 0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 text-center">
                            <div class="rs-bg-reg"></div>
                            <div class="rs-mobal-img">
                                <img src="/images/reg.png" alt="Регистрация"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div style="padding: 1em">
                                <!-- reg form -->
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                           href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"
                                           style="border-radius: 10px 0 0 10px;">Вход</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                           href="#pills-profile" role="tab" aria-controls="pills-profile"
                                           aria-selected="false" style="border-radius: 0 10px 10px 0;">Регистрация</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                        <?php ActiveForm::begin([
                                            'action' => '/login?to=' . urlencode(Yii::$app->request->url)
                                        ]) ?>
                                        <div class="form-group">
                                            <label for="login_emain">E-Mail</label>
                                            <input type="email" name="LoginForm[username]" class="form-control" id="login_emain"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="login_password">Пароль</label>
                                            <input type="password" name="LoginForm[password]" class="form-control" id="login_password"/>
                                        </div>
                                        <div class="form-group custom-control custom-checkbox">
                                            <input type="checkbox" name="LoginForm[rememberMe]" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">Запомнить меня
                                                меня</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="width: 100%">Войти
                                        </button>
                                        <?php ActiveForm::end() ?>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                        <?php $form = ActiveForm::begin([
                                            'id' => 'regForm',
                                            'action' => '/reg'
                                        ]) ?>
                                        <?= $form->field($regModel, 'fio') ?>
                                        <?= $form->field($regModel, 'email') ?>
                                        <?= $form->field($regModel, 'password')->passwordInput() ?>
                                        <?= $form->field($regModel, 'password2')->passwordInput() ?>
                                        <?= $form->field($regModel, 'check')->checkbox() ?>
                                        <button type="submit" class="btn btn-primary" style="width: 100%">
                                            Зарегистрироваться
                                        </button>
                                        <?php ActiveForm::end() ?>
                                    </div>
                                </div>
                                <!-- ./reg form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#regForm').on('beforeSubmit', function(){
            var data = $(this).serialize();
            $.ajax({
                url: '/reg',
                type: 'POST',
                data: data,
                success: function(res){
                    if (res.status === 'true') {
                        $('regForm').html('Для завершения регистрации подтвердите E-Mail');
                    }
                },
                error: function(){
                    alert('Error!');
                }
            });
            return false;
        });

        $(window).scrollTop(0, 0);
        $('[data-toggle="tooltip"]').tooltip();
        document.getElementById('rs-main').style.marginTop = '80px';

        <?php if (defined('PAGE_INDEX') && PAGE_INDEX): ?>
        var el = document.createElement('iframe');
        el.setAttribute('src', 'banner_main.html');
        el.setAttribute('scrolling', 'no');
        el.style.border = 'none';
        el.style.width = '100%';
        el.style.height = '50em';
        el.onload = function () {
            document.body.className = 'loaded';
        };
        document.getElementById('rs_banner_animation').append(el);
        <?php else: ?>
        document.body.className = 'loaded';
        <?php endif; ?>
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
