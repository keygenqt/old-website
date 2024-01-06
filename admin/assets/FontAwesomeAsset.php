<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author KeyGen <keygenqt@gmail.com>
 * @since 2.0
 */
class FontAwesomeAsset extends AssetBundle
{
    public $depends = [
        'yidas\yii\fontawesome\FontawesomeAsset'
    ];
}