<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
        'css/media.css',
        'css/form.css',
    ];

    public $js = [
        'js/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    public $jsOptions = ['position' => View::POS_HEAD];
}
