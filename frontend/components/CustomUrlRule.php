<?php

namespace frontend\components;

use common\models\Post;
use common\models\Translation;
use common\models\TranslationData;
use common\models\Work;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\web\UrlManager;

class CustomUrlRule extends UrlManager
{
    public function init()
    {
        try {
            if (Yii::$app->user->isGuest) {
                $params = ['blocked' => 0, 'is_soon' => 0, 'is_user' => 0];
            } else {
                $params = ['blocked' => 0, 'is_soon' => 0];
            }
            foreach (ArrayHelper::map(Post::find()->where(ArrayHelper::merge(['is_work' => 0], $params))->all(), 'id', 'url') as $id => $url) {
                if (strpos($url, "http") !== false) {
                    continue;
                }
                $this->rules["/blog/<key:$url>"] = 'blog/view';
            }
            foreach (ArrayHelper::map(Post::find()->where(ArrayHelper::merge(['is_work' => 1], $params))->all(), 'id', 'url') as $id => $url) {
                if (strpos($url, "http") !== false) {
                    continue;
                }
                $this->rules["/work/<key:$url>"] = 'blog/view';
            }
            foreach (ArrayHelper::map(TranslationData::find()
                ->leftJoin(Translation::tableName(), Translation::tableName() . '.id=translation_id')
                ->where(\Yii::$app->user->isGuest ? ['is_user' => 0] : [])
                ->all(), 'id', 'url') as $id => $url) {
                if (strpos($url, "http") !== false) {
                    continue;
                }
                $this->rules["/translations/<key:$url>/<style:\d+>"] = 'translations/view';
                $this->rules["/translations/<key:$url>"] = 'translations/view';
            }
            parent::init();
        } catch (InvalidConfigException $e) {
        }
    }
}