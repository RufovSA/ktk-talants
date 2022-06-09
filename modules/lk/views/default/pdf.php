<?php
/** @var \app\models\Users $user */
/** @var \app\models\Works $projects */
/** @var \app\models\Works $diplomas */

?>
<table width="100%">
    <tr>
        <td>
            <img src="https://chart.googleapis.com/chart?cht=qr&chs=100x100&chl=<?= urlencode($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/id' . $user->id) ?>" />
        </td>
        <td align="right" style="vertical-align: middle">
            <img src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?>/images/logo.png" />
        </td>
    </tr>
</table>
<hr />
<table width="100%">
    <tr>
        <td align="center">
            <img class="talents-no-ava" style="width: 200px" src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?><?php if (!$user->photo): ?>/images/avatars/default.png<?php else: ?>/uploads/<?= $user->photo ?><?php endif ?>"/>
        </td>
        <td>
            <div class="header-h1">
                <h1 align="center" style="color: #56178a"><?= $user->fio ?></h1>
                <p align="center"><?= $user->specialty ?> </p>
                <?php
                $skills = explode(',', $user->skills);
                ?>
                <div align="center">
                    <?php foreach ($skills as $skill): ?>
                        <?php $data = explode('|', $skill) ?>
                        <span class="skills badge badge-<?= $data[1] ?? 'dark' ?>"><?= $data[0] ?></span>
                    <?php endforeach ?>
                </div>

                <p>
                    <img src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?>/images/icons/bdate.png" width="16px" style="vertical-align: middle" />
                    <span style="display: inline-block;margin-left: 5px"><?= (new DateTime($user->birthday))->format('d.m.Y') ?></span>
                </p>
                <p>
                    <img src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?>/images/icons/gender.png" width="16px" style="vertical-align: middle" />
                    <span style="display: inline-block;margin-left: 5px">
                    <?php if ($user->gender == 1): ?>Мужской
                        <?php elseif ($user->gender == 2): ?>Женский
                        <?php else: ?>
                        Не указан
                        <?php endif ?>
                    </span>
                </p>
                <p>
                    <img src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?>/images/icons/phone.png" width="16px" style="vertical-align: middle" />
                    <span style="display: inline-block;margin-left: 5px"><?= $user->phone ?></span>
                </p>
                <p>
                    <img src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?>/images/icons/mail.png" width="16px" style="vertical-align: middle" />
                    <span style="display: inline-block;margin-left: 5px"><?= $user->email ?></span>
                </p>
            </div>
        </td>
    </tr>
</table>
<h2>Об мне</h2>
<div><?= $user->about ?></div>
<hr />
<h2>Образование</h2>
<table>
    <tr>
        <td>
            <b>Тип образования:</b>
        </td>
        <td>
            <?= $user->typeofeducation ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Учебное заведение:</b>
        </td>
        <td>
            <?= $user->academic ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Курс:</b>
        </td>
        <td>
            <?= $user->kurs ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Год начала:</b>
        </td>
        <td>
            <?= $user->year ?>
        </td>
    </tr>
</table>

<?php if ($projects): ?>
    <hr />
    <h2>Проекты</h2>
    <br />
    <br />
    <div align="center">
        <?php foreach ($projects as $item): ?>
            <img src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?><?= $item->file ?>" width="200px" style="margin-right: 10px"  />
        <?php endforeach ?>
    </div>
<?php endif ?>

<?php if ($diplomas): ?>
    <br />
    <h2>Дипломы</h2>
    <br />
    <br />
    <div align="center">
        <?php foreach ($diplomas as $item): ?>
            <img src="<?= $_SERVER['REQUEST_SCHEME'] ?>://<?= $_SERVER['SERVER_NAME'] ?><?= $item->file ?>" width="200px" />
        <?php endforeach ?>
    </div>
<?php endif ?>
<br />
