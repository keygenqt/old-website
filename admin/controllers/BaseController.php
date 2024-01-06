<?php

namespace backend\controllers;

use keygenqt\lastPage\LastPage;
use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\helpers\Json;

class BaseController extends LastPage
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (!($this->id == 'site' && ($action->id == 'login' || $action->id == 'index' || $action->id == 'logout'))) {
            if (Yii::$app->user->isGuest || Yii::$app->user->getIdentity()->is_admin == 0) {
                $this->redirect(['/']);
            }
        }
        return parent::beforeAction($action);
    }

    protected function setCache($model, $key, $array)
    {
        /** @var $model Model */
        if ($model->load(Yii::$app->request->get())) {
            $set = false;
            foreach ($model->getAttributes() as $item) {
                if ($item || $item == 0 || $item == '') {
                    $set = true;
                    break;
                }
            }
            if (!$set) {
                return $this->redirect(['user/' . $key]);
            }
            Yii::$app->cache->set('user-filter-' . $key . Yii::$app->user->id, Json::encode($array), 60 * 60 * 24);
        } else {
            Yii::$app->cache->set('user-filter-' . $key . Yii::$app->user->id, null, 0);
        }
    }
}


