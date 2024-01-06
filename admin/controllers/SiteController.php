<?php

namespace backend\controllers;

use common\models\Admin;
use common\models\User;
use Yii;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->getIdentity()->is_admin == 0) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', "User not admin. Enter another user.");
            return $this->redirect(['site/login']);
        }
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = false;

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User(['scenario' => User::SCENARIO_LOGIN]);
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
