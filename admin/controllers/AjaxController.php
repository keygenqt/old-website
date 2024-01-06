<?php

namespace backend\controllers;

use common\components\CImageHandler;
use common\models\Sentence;
use common\models\TranslationData;
use keygenqt\components\ImageHandler;
use modules\forum\components\Queries;
use Yii;
use yii\base\Exception;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * AjaxController controller
 */
class AjaxController extends BaseController
{
    const IMAGE_TRANSLATION = 'translation';
    const IMAGE_BLOG = 'blog';
    const IMAGE_BLOG_BODY = 'blog-image_body';

    public $enableCsrfValidation = false;

    public function actionTranslationParagraph($id, $params)
    {
        if (Yii::$app->request->isAjax) {
            $model = Sentence::findOne(['id' => $id]);
            if ($model != null) {
                $model->paragraph = $params === 'false' ? 0 : 1;
                $model->save();
                echo Json::encode([
                    'success' => true,
                ]);
            } else {
                echo Json::encode([
                    'error' => 'Error save.',
                ]);
            }
            exit;
        }
    }

    public function actionTranslationData($id)
    {
        if (Yii::$app->request->isAjax) {
            $model = Sentence::findOne(['id' => $id]);

            if ($model != null && $model->load(Yii::$app->request->post())) {
                $model->order = $model->order < 0 ? 0 : $model->order;
                if (!($model->order >= Sentence::find()->where(['translations_data_id' => $model->translations_data_id])->count())) {
                    if ($model->save()) {
                        foreach (Sentence::find()->where(['translations_data_id' => $model->translations_data_id])
                                     ->andFilterWhere(['!=', 'id', $model->id])
                                     ->orderBy(['order' => SORT_ASC])
                                     ->all() as $index => $item) {
                            /* @var $item Sentence */
                            $item->order = $model->order <= $index ? $index + 1 : $index;
                            $item->save();
                        }
                    }
                    if ($model->save()) {
                        /* @var TranslationData $parentModel */
                        $parentModel = TranslationData::find()->where(['id' => $model->translations_data_id])->one();
                        $parentModel->updated_at = time();
                        echo Json::encode([
                            'success' => $parentModel->save()
                        ]);
                        exit;
                    }
                }
            }
            echo Json::encode([
                'error' => 'Error save.',
            ]);
        }
    }

    public function actionTranslationDelete($id)
    {
        if (Yii::$app->request->isAjax) {
            $model = Sentence::findOne(['id' => $id]);

            if ($model != null) {
                try {
                    $model->delete();

                    foreach (Sentence::find()->where(['translations_data_id' => $model->translations_data_id])
                                 ->orderBy(['order' => SORT_ASC])
                                 ->all() as $index => $item) {
                        /* @var $item Sentence */
                        $item->order = $index;
                        $item->save();
                    }

                    echo Json::encode([
                        'success' => true
                    ]);
                } catch (\Throwable $e) {
                    echo Json::encode([
                        'error' => 'Error delete.',
                    ]);
                }

            } else {
                echo Json::encode([
                    'error' => 'Error delete.',
                ]);
            }
            exit;
        }
    }

    public function actionUploadImage($type)
    {
        if (Yii::$app->request->isAjax) {
            $url = self::uploadFile($type, 'file');
            if ($url) {
                echo Json::encode([
                    'url' => $url,
                    'error' => false,
                ]);
            } else {
                echo Json::encode([
                    'error' => 'Error upload file.',
                ]);
            }
            exit;
        }
    }

    public static function uploadFile($type, $name)
    {
        $file = UploadedFile::getInstanceByName($name);

        if (!empty($file)) {
            if (
                strpos($file->extension, 'png') !== false ||
                strpos($file->extension, 'jpg') !== false ||
                strpos($file->extension, 'jpeg') !== false
            ) {

                $name = uniqid();

                /** @var ImageHandler $imageHandler */
                $imageHandler = \Yii::$app->get('ih');

                $filePath = Yii::getAlias('@app/../frontend/web/images/' . $type . '/') . $name . '.jpg';

                try {
                    switch ($type) {
                        case self::IMAGE_BLOG:
                            $imageHandler->load($file->tempName)->adaptiveThumb(600, 400)->save($filePath, ImageHandler::IMG_JPEG);
                            break;
                        case self::IMAGE_TRANSLATION:
                            $imageHandler->load($file->tempName)->adaptiveThumb(350, 450)->save($filePath, ImageHandler::IMG_JPEG);
                            break;
                        case self::IMAGE_BLOG_BODY:
                            $imageHandler->load($file->tempName)->thumb(1000, 1000)->save($filePath, ImageHandler::IMG_JPEG);
                            break;
                    }
                    return "/images/$type/$name.jpg";

                } catch (Exception $e) {
                    return false;
                }
            }
        }
        return false;
    }
}
