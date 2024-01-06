<?php

use common\models\User;
use frontend\components\CustomUrlRule;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

Yii::setAlias('@frontend', dirname(__DIR__));

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'timeZone' => 'Europe/Moscow',
    'aliases' => [
        '@bower' => '@vendor/bower-asset'
    ],
    'components' => [
        'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['lifetime' => 7 * 24 * 60 * 60]
        ],
        'assetManager' => [
            'appendTimestamp' => true
        ],
        'user' => [
            'identityClass' => User::className(),
        ],
        'request' => [
            'cookieValidationKey' => 'SDFAsdfajusdfn&&jsd_783fnjs_32ew1',
        ],
        'urlManager' => [
            'class' => CustomUrlRule::className(),
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'login' => 'site/login',
                'canvas' => 'site/canvas-animate',

                '/blog/<page:\d+>/<category:\d+>' => 'blog/index',
                '/blog/<page:\d+>' => 'blog/index',
                'blog' => 'blog/index',

                '/work/<page:\d+>/<category:\d+>' => 'work/index',
                '/work/<page:\d+>' => 'work/index',
                'work' => 'work/index',

                '/translations/<page:\d+>/<book:\d+>' => 'translations/index',
                '/translations/<page:\d+>' => 'translations/index',
                'translations' => 'translations/index',
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
