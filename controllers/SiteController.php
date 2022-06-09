<?php

namespace app\controllers;

use app\models\RegForm;
use app\models\Users;
use app\models\Works;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
        /*return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];*/
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'page_index' => true,
            'footer' => true
        ]);
    }

    public function actionReg()
    {
        if (!Yii::$app->request->isAjax) {
            return $this->goBack();
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        //return [
            //'app' => Yii::getAlias('@app')
        //];

        $model = new RegForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->reg()) {
            return [
                'status' => true
            ];
        }
        $error = $model->getErrors();
        return [
            'status' => false,
            'error' => $error
        ];
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionTalents()
    {
        $usersTop = Users::find()->where(['activate' => '1'])->orderBy(['rank' => SORT_DESC])->limit(3)->all();
        /*$where = '`activate` = 1 AND (';
        for ($i = 0; $i < count($usersTop); $i++) {
            $where .= '`id` != ' . $usersTop[$i]->id;
            if ($i + 1 != count($usersTop)) $where .= ' AND ';
        }
        $where .= ')';*/$where = 'activate = 1';

        $query = Users::find()->where($where)->orderBy(['rank' => SORT_DESC]);

        $pages = new Pagination([
            'totalCount' => $query->count() - 3,
            'pageSize' => 4
        ]);

        $users = $query->offset($pages->offset + 3)
            ->limit($pages->limit)
            ->all();

        return $this->render('talents', compact('users', 'pages', 'usersTop'));
    }

    public function actionActivate()
    {
        if (!$this->request->get('email') || !$this->request->get('key')) {
            return $this->redirect('/login');
        }

        $user = Users::findOne(['email' => $this->request->get('email'), 'activate' => $this->request->get('key')]);

        if (!$user) {
            return $this->redirect('/login');
        }
        $user->activate = '1';
        if ($this->request->get('new_email')) {
            $user->email = $this->request->get('new_email');
        }

        $user->save();

        return $this->render('activate');
    }

    public function actionProfile($id)
    {
        $user = Users::findOne($id);

        $projects = Works::find()->where(['user_id' => $user->id, 'work_type' => 1])->orderBy(['id' => SORT_DESC])->all();
        $diplomas = Works::find()->where(['user_id' => $user->id, 'work_type' => 0])->orderBy(['id' => SORT_DESC])->all();

        if (!$user) throw new NotFoundHttpException('Данная страница удалена или ещё не создана');
        return $this->render('profile', compact('user', 'projects', 'diplomas'));
    }
}
