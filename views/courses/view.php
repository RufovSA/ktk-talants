<?php
$title = 'Курс: Photoshop';
$course = \app\models\Course::find()->where(['=','id', $_GET['id']])->one();
?>
<br><br><br>
<div class="color-while text-right"
     style="background-color: #56178A;padding: 20px 30px 20px 200px;display: inline-block;border-radius: 0 50px 50px 0;font-size: 22px">
    <img src="/images/courses/ps.png" alt="PhotoShop" style="width: 60px;margin-left: 100px"/>
    <span>PhotoShop</span>
</div>

<div class="container">
    <div class="header-h1">
        <h1><?=$course->name?></h1>
    </div>
    <div class="row">
        <div class="col">
            <?php if($course->file != null || $course->file == "empty.jpg") :?>
                <video width="100%" height="500px" src="/uploads/<?=$course->file?>" controls="controls"></video>
                <?php endif;?>
            <br>
            <br>
            <p><?=$course->description?></p>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('rs-main').style.marginTop = '150px';
        document.body.style.backgroundImage = 'url("/images/fon.png")';
        document.body.style.backgroundSize = 'cover';
    });
</script>

