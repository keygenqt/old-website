<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends FrontendController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['download', 'index', 'error', 'login', 'add-theme', 'canvas-animate', 'test'],
                        'roles' => ['?'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['download', 'index', 'error', 'logout', 'blog', 'portfolio', 'canvas-animate', 'mysql', 'artifactory', 'gitlab'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    public function actionMysql()
    {
        return $this->redirect('https://mysql.keygenqt.com/');
    }

    public function actionArtifactory()
    {
        return $this->redirect('https://artifactory.keygenqt.com');
    }

    public function actionGitlab()
    {
        return $this->redirect(['site/git']);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($code = '', $scope = '')
    {
        if ($code != '' && $scope != '') {
            $output = shell_exec("cd /scripts/auth && ./oauth2-2.sh $code");
            return $this->render('code', ['output' => $output]);
        }
        return $this->render('index');
    }

    public function actionLogin()
    {
        $session = Yii::$app->session;
        $theme = $session->get('theme');

        $model = new User(['scenario' => User::SCENARIO_LOGIN]);

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $session = Yii::$app->session;
            $session->set('theme', $theme);

            return $this->redirect(Yii::$app->user->getReturnUrl());
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

//    public function actionAddToken()
//    {
//        $output = shell_exec("cd /scripts/auth && ./oauth2-1.sh");
//        $this->redirect($output);
//        return false;
//    }

    public function actionLogout()
    {
        $session = Yii::$app->session;
        $theme = $session->get('theme');

        $url = Yii::$app->user->getReturnUrl();
        Yii::$app->user->logout();

        $session = Yii::$app->session;
        $session->set('theme', $theme);

        return $this->redirect($url);
    }

    /////////////////
    public function actionTest($type)
    {
        if ($type == 'post') {
            file_put_contents(Yii::getAlias('@webroot') . '/../runtime/post-test', print_r($_POST, true));
            echo print_r($_POST, true);
            Yii::$app->end();
        }
        throw new NotFoundHttpException('Not found page');
    }

    public function actionCanvasAnimate()
    {
        return $this->render('canvas-animate');
    }
}
