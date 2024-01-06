<?php

namespace backend\controllers;

use common\models\Sentence;
use common\models\TranslationData;
use keygenqt\components\Html;
use Yii;

/**
 * ChapterController controller
 */
class TranslationDataController extends BaseController
{
    public function actionIndex()
    {
        $model = new TranslationData();

        $model->setScenario(TranslationData::SCENARIO_FILTER);

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id = null)
    {
        $model = $id === null ? new TranslationData() : TranslationData::findOne(['id' => $id]);
        $model->setScenario(TranslationData::SCENARIO_UPDATE);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->_is_add) {
                $model->setScenario(TranslationData::SCENARIO_ADD_SEN);
                if ($model->validate()) {
                    $sentence = new Sentence();
                    $sentence->setAttributes([
                        'translations_data_id' => $model->id,
                        'eng' => $model->eng,
                        'ru' => $model->ru,
                        'order' => -1,
                        'paragraph' => $model->paragraph,
                    ]);
                    $sentence->save();
                }
            }

            $model->setScenario(TranslationData::SCENARIO_UPDATE);

            if (!$model->hasErrors() && $model->save()) {
                Yii::$app->session->setFlash('success', $id == null ? "Insert success" : "Update success");
                return $this->redirect(['translation-data/update', 'id' => $model->id]);
            } else {
                Yii::$app->getSession()->setFlash('error', Html::errorSummary($model));
            }
        }
        return $this->render('update', [
            'model' => $model,
            'sentence' => new Sentence()

        ]);
    }

    public function actionDelete($id)
    {
        $model = TranslationData::findOne(['id' => $id]);
        if ($model == null) {
            Yii::$app->session->setFlash('error', "Model not found");
            return $this->redirect(Yii::$app->user->getReturnUrl());
        }
        $model->delete();
        Yii::$app->session->setFlash('success', "Delete success");
        return $this->redirect(Yii::$app->user->getReturnUrl());
    }
}
