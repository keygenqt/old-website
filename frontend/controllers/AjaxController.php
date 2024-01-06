<?php

namespace frontend\controllers;

use common\models\Post;
use common\models\Test;
use common\models\User;
use keygenqt\components\ImageHandler;
use Yii;
use yii\base\Exception;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * AjaxController controller
 */
class AjaxController extends FrontendController
{
    public $enableCsrfValidation = false;

    public function actionAddTheme($theme = 0)
    {
        if (Yii::$app->request->isAjax) {
            $session = Yii::$app->session;
            $session->set('theme', $theme);
        }
        return Json::encode([
            'error' => 0,
            'theme' => $theme
        ]);
    }

    public function actionSearch($term)
    {
        if (Yii::$app->request->isAjax) {

            sleep(2); // for test

            $results = [];
            if (is_numeric($term)) {
                /** @var Test $model */
                $model = Test::findOne(['id' => $term]);

                if ($model) {
                    $results[] = [
                        'id' => $model['id'],
                        'label' => $model['email'] . ' (model id: ' . $model['id'] . ')',
                    ];
                }
            } else {
                $q = addslashes($term);
                foreach (Test::find()->where("(`email` like '%{$q}%')")->all() as $model) {
                    $results[] = [
                        'id' => $model['id'],
                        'label' => $model['email'] . ' (model id: ' . $model['id'] . ')',
                    ];
                }
            }
            echo Json::encode($results);
        }
    }

    const IMAGE_TEST = 'test';

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

                $filePath =
                    Yii::getAlias('@app/../frontend/web/download/images/' . $type . '/') . $name . '.jpg';

                try {
                    switch ($type) {
                        case self::IMAGE_TEST:
                            $imageHandler->load($file->tempName)
                                ->adaptiveThumb(350, 350)
                                ->save($filePath, ImageHandler::IMG_JPEG);
                            break;
                    }
                    return "/download/images/$type/$name.jpg";

                } catch (Exception $e) {
                    return false;
                }
            }
        }
        return false;
    }
}
