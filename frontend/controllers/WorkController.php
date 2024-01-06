<?php

namespace frontend\controllers;

use common\models\CategoryBlog;
use common\models\Post;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class WorkController extends FrontendController
{
    public function getViewPath()
    {
        return \Yii::getAlias('@frontend/views/blog');
    }

    public function actionIndex($category = 0)
    {
        $model = new Post();
        $model->is_work = 1;

        return $this->render('index', [
            'categories' => ArrayHelper::merge([0 => "All"], ArrayHelper::map(CategoryBlog::find()
                ->where(['is_work' => 1])->orderBy('order')->all(), 'id', 'title')),
            'category' => $category,
            'model' => $model
        ]);
    }

    public function actionView($key)
    {
        $this->model = Post::findOne(['url' => $key]);
        if ($this->model == null) {
            throw new NotFoundHttpException();
        }
        return $this->render("view", [
            'model' => $this->model
        ]);
    }
}
