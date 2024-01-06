<?php

use keygenqt\components\ImageHandler;
use yii\web\Session;

Yii::setAlias('@common', dirname(__DIR__));

return [
    'timeZone' => 'Europe/Moscow',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => require __DIR__ . '/db.php',
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'session' => [
            'class' => Session::className(),
            'cookieParams' => ['lifetime' => 7 * 24 * 60 * 60]
        ],
        'ih' => [
            'class' => ImageHandler::className(),
        ],
    ]
];
