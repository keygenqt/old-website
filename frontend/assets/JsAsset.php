<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class JsAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_BEGIN];
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/js/animator.js',
        'js/parallax.js',
        'js/numbermask.js',
    ];
}
