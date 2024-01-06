<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class TippyAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $css = [
        'https://unpkg.com/tippy.js@6/animations/scale.css',
    ];
    public $js = [
        'https://unpkg.com/@popperjs/core@2',
        'https://unpkg.com/tippy.js@6',
    ];
}
