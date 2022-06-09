<?php

namespace app\controllers;

use app\models\News;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class NewsController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = News::find()->where(['status' => 1])->orderBy('createdate');

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 4
        ]);

        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)->all();
        return $this->render('index', compact('pages', 'posts'));
    }

    public function actionView($id)
    {
        $post = News::findOne($id);
        return $this->render('post', compact('post'));
    }
}