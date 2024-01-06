<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\RainbowAsset;
use keygenqt\fancyBox3\FancyBox3;

$this->title = 'Keygenqt | ' . $model->getTitle();

FontAwesomeAssets::register($this);
RainbowAsset::register($this);

?>

<style>
    /*fix frontend*/
    .blog-view .body {
        margin-top: 30px;
    }

    .blog-view .title {
        display: none;
    }

    @media (max-width: 545px) {
        .screener-0 .block-index .panel-info pre,
        .screener-0 .block-index .panel-info div {
            display: none;
        }
    }
    /*fix frontend*/
</style>

<style>
    .screener-0 .block-index {
        background: #1c393e;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
    }

    .screener-0 .block-index .title {
        padding-top: 10px;
        padding-bottom: 15px;
        margin-bottom: 20px;
        display: block;
    }
</style>

<div class="page-row screener-0">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    FancyBox3
                </div>
                <div class="panel panel-info">

                    <p>
                        Extension yii for library <a href="http://fancyapps.com/fancybox/3/" target="_blank">FancyBox3</a>
                        <br>
                        <br>
                    </p>

                    <div style="font-size: 24px;" class="title">
                        Installation
                    </div>

                    <div>
                        The preferred way to install this extension is through <a target="_blank"
                                                                                  href="http://getcomposer.org/download/">composer</a>.
                        <br>
                        <br>
                        Either add
                        <br>
                        <br>
                    </div>

                    <pre>
    <code data-language="php">"require": {
    "keygenqt/yii2-fancybox3": "*"
}</code>
</pre>

                    <div>
                        of your <a target="_blank" href="https://getcomposer.org/doc/">composer.json</a> file.
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-1 .block-index {
        background: #5269af;
        padding: 30px;
        color: #000000;
        border: 1px solid #727684;
        margin-bottom: 30px;
    }

    .screener-1 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }
</style>

<div class="page-row screener-1">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">

                <div class="title">
                    Example
                </div>

                <?php FancyBox3::begin([

                    'nameBtn' => 'Open FancyBox3',

                    'btnOption' => [
                        'class' => 'btn'
                    ],
                    'jsOption' => [
                        'focus' => false,
                    ]
                ]) ?>

                <div>
                    <h2>Hello!</h2>
                    <p>This is animated content! Cool, right?</p>
                </div>

                <?php FancyBox3::end() ?>

                <?= FancyBox3::widget([

                    'nameBtn' => 'Open url YouTube',
                    'src' => 'https://www.youtube.com/watch?v=jZiWG-dcvew',

                    'btnOption' => [
                        'class' => 'btn'
                    ],
                    'jsOption' => [
                        'focus' => false,
                    ]
                ]) ?>

            </div>
        </div>
    </div>
</div>

<style>
    .screener-1 .block-index {
        background: #727684;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
    }

    .screener-1 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }
</style>

<div class="page-row screener-1">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    Example code
                </div>
                <div class="panel panel-info">

<pre>
    <code data-language="php">&#60;?php FancyBox3::begin([

    'nameBtn' => 'Open FancyBox3',

    'btnOption' => [
        'class' => 'btn'
    ],
    'jsOption' => [
        'focus' => false,
    ]
]) ?>

<div>
    <h2>Hello!</h2>
    <p>This is animated content! Cool, right?</p>
</div>

&#60;?php FancyBox3::end() ?></code>
</pre>

<pre style="margin-bottom: 0;">
    <code data-language="php">&#60;?= FancyBox3::widget([

    'nameBtn' => 'Open url YouTube',
    'src' => 'https://www.youtube.com/watch?v=jZiWG-dcvew',

    'btnOption' => [
        'class' => 'btn'
    ],
    'jsOption' => [
        'focus' => false,
    ]
]) ?></code>
</pre>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-3 .block-index {
        background: #3e3e3e;
        padding: 30px;
        color: #ffffff;
        border: 1px solid #727684;
        position: relative;
        margin-bottom: 30px;
    }

    .screener-3 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }

    .screener-3 .block-index a {
        text-decoration: underline;
    }
</style>

<div class="page-row screener-3">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    License Extension
                </div>
                <div class="panel panel-info">
                    <a target="_blank" href="http://www.apache.org/licenses/LICENSE-2.0.txt">
                        Apache License, Version 2.0
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-4 .block-index {
        background: #3e3e3e;
        padding: 30px;
        color: #ffffff;
        border: 1px solid #727684;
        position: relative;
    }

    .screener-4 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }

    .screener-4 .block-index a {
        text-decoration: underline;
    }
</style>

<div class="page-row screener-4">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    License FancyBox
                </div>
                <div class="panel panel-info">
                    fancybox is licensed under the <a target="_blank" href="https://www.gnu.org/licenses/gpl-3.0.en.html">GPLv3</a> license for all open source applications.
                    A commercial license is required for all commercial applications (including sites, themes and apps you plan to sell).
                    <br>
                    <br>
                    More details here: <a target="_blank" href="http://fancyapps.com/fancybox/3/#license">Licenses</a>
                </div>
            </div>
        </div>
    </div>
</div>