<?php

namespace backend\controllers;

use common\models\Post;
use keygenqt\components\Html;
use keygenqt\sceditor\SCEditor;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * BlogController controller
 */
class PostController extends BaseController
{
    public function actionIndex($work = 0)
    {
        $model = new Post(['scenario' => Post::SCENARIO_FILTER]);

        return $this->render('index-' . (empty($work) ? 'blog' : 'work'), [
            'model' => $model
        ]);
    }

    public function actionUpdate($id = null, $work = 1)
    {
        $model = $id === null ? new Post() : Post::findOne(['id' => $id]);

        if ($model == null) {
            throw new NotFoundHttpException('Not found page');
        }

        if ($model->isNewRecord) {
            $model->is_work = $work;
        }

        if ($model->load(Yii::$app->request->post())) {

            switch ($model->post_type) {
                case Post::TYPE_DEFAULT:
                    $model->setScenario(Post::SCENARIO_UPDATE_DB);
                    break;
                case Post::TYPE_FILE:
                    $model->setScenario(Post::SCENARIO_UPDATE_FILE);
                    break;
                case Post::TYPE_URL:
                    $model->setScenario(Post::SCENARIO_UPDATE_URL);
                    break;
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', $id == null ? "Insert success" : "Update success");
                return $this->redirect(['post/update', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', Html::errorSummary($model));
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Post::findOne(['id' => $id]);
        if ($model == null) {
            Yii::$app->session->setFlash('error', "Model not found");
            return $this->redirect(Yii::$app->user->getReturnUrl());
        }
        $model->delete();
        Yii::$app->session->setFlash('success', "Delete success");
        return $this->redirect(Yii::$app->user->getReturnUrl());
    }
}
