<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author KeyGen <keygenqt@gmail.com>
 * @since 2.0
 */
class LayoutPageAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

	public $css = [
        'css/page.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
