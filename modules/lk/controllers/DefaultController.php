<?php

namespace app\modules\lk\controllers;

use app\models\ImageUpload;
use app\models\Works;
use app\modules\lk\models\EmailModel;
use app\modules\lk\models\PasswordModel;
use Dompdf\Dompdf;
use app\models\User;
use app\models\Users;
use app\modules\lk\models\EditModel;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

/**
 * Default controller for the `lk` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect('/id' . Yii::$app->user->id);
    }

    public function actionEdit()
    {
        $model = new EditModel();
        if ($this->request->isPost && $model->reg()) {
            Yii::$app->session->setFlash('success', 'Данные пользователя успешно сохранены');
            return $this->redirect('/lk/edit');
        }

        $model->fio = Yii::$app->user->identity->fio;
        $model->specialty = Yii::$app->user->identity->specialty;
        $model->typeofeducation = Yii::$app->user->identity->typeofeducation;
        $model->kurs = Yii::$app->user->identity->kurs;
        $model->academic = Yii::$app->user->identity->academic;
        $model->year = Yii::$app->user->identity->year;
        $model->birthday = Yii::$app->user->identity->birthday;
        $model->gender = Yii::$app->user->identity->gender;
        $model->phone = Yii::$app->user->identity->phone;
        $model->about = Yii::$app->user->identity->about;
        $model->skills = Yii::$app->user->identity->skills;

        return $this->render('edit', compact('model'));
    }

    public function actionEmail()
    {
        $model = new EmailModel();
        if ($this->request->isPost && $model->reg()) {
            Yii::$app->session->setFlash('success', 'Для подтверждения нового E-Mail перейдите по ссылке из письма');
            return $this->redirect('/lk');
        }

        return $this->render('email', compact('model'));
    }

    public function actionAva()
    {
        $model = new ImageUpload;
        if(Yii::$app->request->isPost) {
            $user = Users::findOne(Yii::$app->user->identity->id);

            $file = UploadedFile::getInstance($model, 'image');

            $user->photo = $model->uploadFile($file, $user->photo);

            if($user->save(false)) {
                Yii::$app->session->setFlash('success', 'Фотография успешна изменина');
                return $this->redirect('/id' . $user->id);
            }

        }
        return $this->render('image',['model'=>$model]);
    }

    public function actionPassword()
    {
        $model = new PasswordModel();
        if ($this->request->isPost && $model->reg()) {
            Yii::$app->session->setFlash('success', 'Вы успешно изменили пароль');
            return $this->redirect('/lk');
        }

        return $this->render('password', compact('model'));
    }

    public function actionPdf()
    {
        $user = Users::findOne(Yii::$app->user->identity->id);

        $projects = Works::find()->where(['user_id' => $user->id, 'work_type' => 1])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $diplomas = Works::find()->where(['user_id' => $user->id, 'work_type' => 0])->orderBy(['id' => SORT_DESC])->limit(6)->all();


        $this->layout = 'pdf';

        $dompdf = new Dompdf();

        $dompdf->loadHtml($this->render('pdf',compact('user', 'projects', 'diplomas')));

        $options = $dompdf->getOptions();

        $options->set('enable_remote', true);
        //$options->set('defaultFont', 'dejavu sans');

        $dompdf->setOptions($options);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('statement.pdf', ['Attachment' => 0]);
        exit();
    }
}
