<?php

namespace app\controllers;

use app\models\Course;
use app\models\CourseCategory;
use yii\web\Controller;
use Yii;

class CoursesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCategory()
    {
        $courses = Course::find()->all();
        $category = CourseCategory::find()->where(['=','id',$_GET['category']])->one();
        return $this->render('category',[
            'courses'=>$courses,
            'category'=>$category,
        ]);
    }
    public function actionView()
    {
        return $this->render('view');
    }
}