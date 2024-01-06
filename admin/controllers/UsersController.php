<?php

namespace backend\controllers;

use common\models\User;
use keygenqt\components\Html;
use Yii;

/**
 * UsersController controller
 */
class UsersController extends BaseController
{
    public function actionIndex()
    {
        $model = new User();

        $model->setScenario(User::SCENARIO_FILTER);

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id = null)
    {
        $model = $id === null ? new User() : User::findOne(['id' => $id]);
        $model->setScenario(User::SCENARIO_UPDATE);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', 'User ' . ($id === null ? "added (password: {$model->_password})" : 'update') . ' success!');
                return $this->redirect(['users/update', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', Html::errorSummary($model));
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = User::findOne(['id' => $id]);
        if ($model == null) {
            Yii::$app->session->setFlash('error', "Model not found");
            return $this->redirect(Yii::$app->user->getReturnUrl());
        }
        $model->delete();
        Yii::$app->session->setFlash('success', "Delete success");
        return $this->redirect(Yii::$app->user->getReturnUrl());
    }
}
