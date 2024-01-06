<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class GlideAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'js/glide/dist/css/glide.core.min.css',
        'js/glide/dist/css/glide.theme.min.css',
    ];
    public $js = [
        'js/glide/dist/glide.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
