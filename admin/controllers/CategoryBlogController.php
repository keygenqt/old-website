<?php

namespace backend\controllers;

use common\models\CategoryBlog;
use keygenqt\components\Html;
use Yii;

/**
 * CategoryBlogController controller
 */
class CategoryBlogController extends BaseController
{
    public function actionIndex()
    {
        $model = new CategoryBlog();

        $model->setScenario(CategoryBlog::SCENARIO_FILTER);

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id = null)
    {
        $model = $id === null ? new CategoryBlog() : CategoryBlog::findOne(['id' => $id]);
        $model->setScenario(CategoryBlog::SCENARIO_UPDATE);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', $id == null ? "Insert success" : "Update success");
                return $this->redirect(['category-blog/update', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', Html::errorSummary($model));
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = CategoryBlog::findOne(['id' => $id]);
        if ($model == null) {
            Yii::$app->session->setFlash('error', "Model not found");
            return $this->redirect(Yii::$app->user->getReturnUrl());
        }
        $model->delete();
        Yii::$app->session->setFlash('success', "Delete success");
        return $this->redirect(Yii::$app->user->getReturnUrl());
    }
}
