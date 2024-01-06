<?php

namespace frontend\controllers;

use common\models\CategoryBlog;
use common\models\Post;
use common\models\TestModel;
use common\models\Timestamp;
use common\models\YouTubeUrl;
use keygenqt\components\Html;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class BlogController extends FrontendController
{
    public function actionIndex($category = 0)
    {
        $model = new Post();
        $model->is_work = 0;

        return $this->render('index', [
            'categories' => ArrayHelper::merge([0 => "All"], ArrayHelper::map(CategoryBlog::find()
                ->where(['is_work' => 0])->orderBy('order')
                ->all(), 'id', 'title')),
            'category' => $category,
            'model' => $model
        ]);
    }

    public function actionView($key)
    {
        $testModel = new TestModel();
        $youTubeUrl = new YouTubeUrl();
        $timestamp = new Timestamp();

        switch ($key) {
            case 'yii2-autocomplete-ajax':
                $testModel->setScenario(TestModel::SCENARIO_AUTOCOMPLETE);
                break;
            case 'yii2-image-ajax':
                $testModel->setScenario(TestModel::SCENARIO_IMAGE);
                break;
            case 'yii2-json-form':
                $testModel->setScenario(TestModel::SCENARIO_JSON);
                break;
            case 'yii2-SCEditor':
                $testModel->setScenario(TestModel::SCENARIO_SCEDITOR);
                break;
            case 'js-numbermask':
                $testModel->setScenario(TestModel::SCENARIO_NUMBERMASK);
                break;
        }


        if ($testModel->load(Yii::$app->request->post())) {
            $testModel->clear();
            if ($testModel->validate()) {
                Yii::$app->session->setFlash('success', "Update model successfully");
            }
        }

        if ($timestamp->load(Yii::$app->request->post())) {
            $timestamp->date();
        }

        if ($youTubeUrl->checkPermission()) {
            $youTubeUrl->load(Yii::$app->request->post());
            $youTubeUrl->getFormats();
        }
        if (!empty($youTubeUrl->video_id)) {
            $youTubeUrl->download();
        }

        $this->model = Post::findOne(['url' => $key]);
        if ($this->model == null) {
            throw new NotFoundHttpException();
        }
        return $this->render("view", [
            'model' => $this->model,
            'params' => [
                'testModel' => $testModel,
                'youTubeUrl' => $youTubeUrl,
                'timestamp' => $timestamp
            ]
        ]);
    }
}
