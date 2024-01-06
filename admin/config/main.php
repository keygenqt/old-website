<?php

use common\components\ErrorHandler;
use common\models\User;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

Yii::setAlias('@frontend', dirname(__DIR__) . '/../frontend');
Yii::setAlias('@backend', dirname(__DIR__));

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'name' => 'Admin Panel',
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'site/index',
    'timeZone' => 'Europe/Moscow',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true
        ],
        'user' => [
            'identityClass' => User::className(),
            'enableAutoLogin' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'SDFAsasdfasdf*99023dfkjsdfjkkend11',
            'csrfParam' => '_backendCSRF',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login' => 'site/login'
            ]
        ],
        'errorHandler' => [
            'class' => ErrorHandler::className(),
            'errorAction' => 'site/error',
            'path' => 'frontend'
        ],
    ],
    'params' => $params,
];
