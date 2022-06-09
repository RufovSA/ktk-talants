<?php

use app\models\CourseCategory;

$title = 'Курс: Photoshop';

?>
<br><br><br>
    <div class="color-while text-right"
         style="background-color: #56178A;padding: 20px 30px 20px 200px;display: inline-block;border-radius: 0 50px 50px 0;font-size: 22px">
        <img src="/uploads/<?=$category->image?>" alt="PhotoShop" style="width: 60px;margin-left: 100px"/>
        <span><?=$category->name?></span>
    </div>

    <div class="container">
        <div class="header-h1">
            <h1>Глава 1</h1>
        </div>

        <div id="rs-elem-course" class="row">
            <?php foreach ($courses as $course):?>

                    <div class="col-md-6 col-lg-6 col">
                        <a href="/courses/view/?id=<?=$course->id?>">
                        <div class="card">
                            <img class="card-img-top" src="/uploads/<?=$course->cover?>" alt="..." style="width: 100%; max-height: 300px; min-height: 300px"/>
                            <div class="card-body">
                                <h5 class="mt-0"><?=$course->name?></h5>
                            </div>
                        </div>
                        </a>
                    </div>


            <?php endforeach;?>
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

