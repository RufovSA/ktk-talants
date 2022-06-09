<div id="rs_talent_top" style="margin-top: 80px;">
    <img src="images/bg_talents.png" style="position: relative;"/>
    <div style="position: relative;z-index: 1;margin-top: -150px;">
        <div class="text-center color-while"
             style="position: absolute;margin-top: -120px;margin-left: -100px;left: 50%;font-size: 32px;">ТОП ТАЛАНТОВ
        </div>
        <div class="container text-center">
            <div class="row">
                <?php for ($i = 0; $i < count($usersTop); $i++): ?>
                    <div class="col-md-4">
                        <a href="/id<?= $usersTop[$i]->id ?>">
                            <img class="talents-no-ava<?php if ($i == 1): ?> __no__margin__top <?php endif ?>" src="<?php if (!$usersTop[$i]->photo): ?>/images/avatars/default.png<?php else: ?>/uploads/<?= $usersTop[$i]->photo ?><?php endif ?>"/>
                            <h3><?= $usersTop[$i]->fio ?></h3>
                            <p><?= $usersTop[$i]->specialty ?></p>
                        </a>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row profiles__cards">
        <?php foreach ($users as $user): ?>
            <div class="col-md-6">
                <div class="card rs__mt_30">
                    <div class="card-text">
                        <div class="portada"></div>
                        <div class="title-total">
                            <div class="img-avatar" style="background-image: url('<?php if (!$user->photo): ?>/images/avatars/default.png<?php else: ?>/uploads/<?= $user->photo ?><?php endif ?>')"></div>
                            <div style="margin-left: 45px">
                                <div class="title"><?= $user->specialty ?></div>
                                <h3><?= $user->fio ?></h3>
                                <?php
                                $skills = explode(',', $user->skills);
                                ?>
                                <div>
                                    <?php foreach ($skills as $skill): ?>
                                        <?php $data = explode('|', $skill) ?>
                                        <span class="badge badge-<?= $data[1] ?? 'dark' ?>"><?= $data[0] ?></span>
                                    <?php endforeach ?>
                                </div>
                                <div class="desc"><?= $user->academic ?></div>
                                <div class="actions">
                                    <a href="/id<?= $user->id ?>">
                                        <button type="button" data-toggle="tooltip" data-placement="top"
                                                title="Посмотреть работы">
                                            <i class="fa fa-briefcase"></i>
                                        </button>
                                    </a>
                                    <a href="/id<?= $user->id ?>">
                                        <button type="button" data-toggle="tooltip" data-placement="top"
                                                title="Посмотреть дипломы">
                                            <i class="fa fa-graduation-cap"></i>
                                        </button>
                                    </a>
                                    <a href="/id<?= $user->id ?>">
                                        <button type="button" data-toggle="tooltip" data-placement="top"
                                                title="Посмотреть профиль">
                                            <i class="fa fa-user-circle"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <br/>
    <br/>

    <?= \yii\bootstrap4\LinkPager::widget([
        'pagination' => $pages,
    ]) ?>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
