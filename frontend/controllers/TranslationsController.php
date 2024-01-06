<?php

namespace frontend\controllers;

use common\models\Translation;
use common\models\TranslationData;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class TranslationsController extends FrontendController
{
    public function actionIndex($book = 0)
    {
        return $this->render('index', [
            'categories' => ArrayHelper::merge([0 => "All"], ArrayHelper::map(Translation::find()
                ->where(\Yii::$app->user->isGuest ? ['is_user' => 0] : [])
                ->orderBy('order')->all(), 'id', 'title')),
            'book' => $book,
            'model' => new TranslationData()
        ]);
    }

    public function actionView($key)
    {
        $this->model = TranslationData::findOne(['url' => $key]);
        if ($this->model == null) {
            throw new NotFoundHttpException();
        }
        return $this->render("view", [
            'model' => $this->model
        ]);
    }
}
