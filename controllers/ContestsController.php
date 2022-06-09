<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;

class ContestsController extends Controller
{
    public function actionBp()
    {
        return $this->render('bp');
    }

    public function actionXod()
    {
        return $this->render('xod');
    }
}