<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class RainbowAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'rainbow/themes/css/obsidian.css',
    ];
    public $js = [
        'rainbow/rainbow-custom.min.js',
    ];
}
