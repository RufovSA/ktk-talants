<?php
/** @var \app\models\Users $user */
/** @var \app\models\Works $projects */
/** @var \app\models\Works $diplomas */

?>
<style>
    .data {
        display: inline-block;
        padding: 6px 0;
    }

    .btn-primary:disabled {
        background-color: #480288;
        border: 1px solid #480288;
    }

    .btn-primary:disabled:hover {
        background-color: #480288;
        border: 1px solid #480288;
        color: white;
    }

    .btn-primary {
        background-color: #ffffff;
        border: 1px solid #480288;
        color: #480288;
    }

    .btn-primary:hover {
        background-color: #480288;
        border: 1px solid #480288;
        color: white;
    }

    .genderbtn {
        margin: 0 10px;
    }

    .educationinfo {
        font-weight: 300;
    }

    .skills {
        padding: 10px;
        font-size: 18px;
        border-radius: 20px;
        margin: 0 10px 20px 0;
    }

    .skills:hover {
        box-shadow: 0 0 5px red;
        transition: .5s;
        cursor: pointer;

    }

</style>
<div id="rs_talent_top" style="margin-top: 80px;">
    <img src="images/bg_talents.png" style="position: absolute; width: 100%; max-height: 225px"/>
    <div style="position: relative;z-index: 1; padding: 130px 0 0 0">

        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 gallery-item">
                    <a data-lg-size="1600-1067" data-src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?><?php if (!$user->photo): ?>/images/avatars/default.png<?php else: ?>/uploads/<?= $user->photo ?><?php endif ?>" data-sub-html="<?= $user->fio ?>">
                        <img class="img-responsive talents-no-ava"
                             src="<?php if (!$user->photo): ?>/images/avatars/default.png<?php else: ?>/uploads/<?= $user->photo ?><?php endif ?>"/>
                    </a>
                </div>
                <div class="col-md-6" style="padding: 120px 0 0 0">
                    <h2><?= $user->fio ?></h2>
                    <h5><?= $user->specialty ?></h5>
                </div>
                <?php if (Yii::$app->user->identity->id == $user->id): ?>
                    <div class="col-md-2" style="padding: 130px 0 0 0;">
                        <a href="/lk/pdf" target="_blank">
                            <button class="btn btn-primary" style=" min-height: 50px; width: 100%">Скачать PDF</button>
                        </a>
                    </div>
                <?php endif ?>
            </div>
            <div class="row justify-content-end">

            </div>
        </div>
        <div class="container" style="margin-top: 80px; padding: 0 0 0 60px">
            <div class="row">
                <div class="col-md-3">
                    <h4>Дата рождения</h4>
                    <br>
                    <p class="data"><?= $user->birthday ?></p>
                    <br>

                    <?php if ($user->gender != 0): ?><h4 style="display: inline">Пол</h4><?php endif ?>
                    <?php if ($user->gender == 2): ?>
                        <button style="display: inline" class="btn btn-primary genderbtn" disabled value="0">Ж</button>
                        <button style="display: inline" class="btn btn-primary genderbtn" value="1">М</button>
                    <?php endif; ?>
                    <?php if ($user->gender == 1): ?>
                        <button style="display: inline" class="btn btn-primary genderbtn" value="0">Ж</button>
                        <button style="display: inline" class="btn btn-primary genderbtn" disabled value="1">М</button>
                    <?php endif; ?>
                </div>

                <div class="col-md-3">
                    <h4>Контакты</h4>
                    <br>
                    <a class="data" href="tel:<?= $user->phone ?>"><?= $user->phone ?></a>
                    <br>
                    <a class="data" href="mailto:<?= $user->email ?>"><?= $user->email ?></a>
                </div>
                <div class="col-md-6 col">
                    <h4 align="left">О себе</h4>
                    <br>
                    <p align="left"><?= $user->about ?></p>
                </div>
            </div>
            <br>
            <h4>Образование</h4>
            <br>
            <div class="row">
                <div class="col-md-3 col-6">
                    <h5>Тип образования</h5>
                    <br>

                    <h5>Учебное заведение</h5>
                    <br>

                    <h5>Курс</h5>
                    <br>

                    <h5>Год начала</h5>
                    <br>
                </div>
                <div class="col-md-3 col-6">
                    <h5 class="educationinfo"><?= $user->typeofeducation ?></h5>
                    <br>

                    <h5 class="educationinfo"><?= $user->academic ?></h5>
                    <br>

                    <h5 class="educationinfo"><?= $user->kurs ?></h5>
                    <br>

                    <h5 class="educationinfo"><?= $user->year ?></h5>
                    <br>
                </div>
            </div>
            <?php
            $skills = explode(',', $user->skills);
            ?>
            <div>
                <?php foreach ($skills as $skill): ?>
                    <?php $data = explode('|', $skill) ?>
                    <span class="skills badge badge-<?= $data[1] ?? 'dark' ?>"><?= $data[0] ?></span>
                <?php endforeach ?>
            </div>

            <?php if ($projects): ?>
                <h2>Проекты</h2>
                <div class="row">
                    <?php foreach ($projects as $item): ?>
                        <div class="col-md-3">
                            <div class="porfolio_img" style="background-image: url('<?= $item->file ?>');"></div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <?php if ($diplomas): ?>
                <br />
                <h2>Дипломы</h2>
                <div class="row">
                    <?php foreach ($diplomas as $item): ?>
                        <div class="col-md-3">
                            <div class="porfolio_img" style="background-image: url('<?= $item->file ?>');"></div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <br />
        </div>
    </div>
</div>
<script>

</script>
<style>
    .porfolio_img {
        width: 200px;
        height: 200px;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .col-md-4 {
        margin-bottom: 10px;
    }
</style>
