<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\RainbowAsset;

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

    @media (max-width: 1040px) {
        .screener-1 {
            display: none;
        }
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
                    Panel Count
                </div>
                <div class="panel panel-info">

                    <p>
                        Panel animation number
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
    "keygenqt/yii2-panel-count": "*"
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
    .screener-2 .block-index {
        background: #ffffff;
        padding: 30px;
        color: #000000;
        border: 1px solid #727684;
        margin-bottom: 30px;
    }

    .screener-2 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }

    body.black .blog-view .screener-2 .title,
    body.black form .form-group label.control-label {
        color: #4F5364;
    }
    body.black form .form-group.has-error label.control-label {
        color: #F82A5A;
    }

    .screener-2 .yii2-panel-count.panel-tomato {
        margin-bottom: 0;
    }
</style>

<div class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">

                <div class="title">
                    Example
                </div>

                <?= keygenqt\panelCount\PanelCount::widget([
                    'icon' => 'fas fa-book',
                    'count' => 155.50,
                    'title' => 'My books',
                    'format' => true,
                ]) ?>

                <?= keygenqt\panelCount\PanelCount::widget([
                    'icon' => 'fas fa-bookmark',
                    'count' => 124.50 . ' $',
                    'title' => 'My bookmark',
                    'duration' => 1000,
                    'up' => true,
                    'color' => 'cadetblue',
                    'format' => true,
                ]) ?>

                <?= keygenqt\panelCount\PanelCount::widget([
                    'icon' => 'fas fa-font',
                    'count' => 19999,
                    'title' => 'My font',
                    'up' => false,
                    'color' => 'darkmagenta'
                ]) ?>

                <?= keygenqt\panelCount\PanelCount::widget([
                    'count' => 19999,
                    'title' => 'My title',
                    'color' => 'tomato'
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
                    Example form code
                </div>
                <div class="panel panel-info">

<pre>
    <code data-language="php">&#60;?= keygenqt\panelCount\PanelCount::widget([
    'icon'      => 'fas fa-book',
    'count'     => 155.50,
    'title'     => 'My books',
    'format'    => true,
]) ?>

&#60;?= keygenqt\panelCount\PanelCount::widget([
    'icon' => 'fas fa-bookmark',
    'count' => 124.50 . " $",
    'title' => 'My bookmark',
    'duration' => 1000,
    'up' => true,
    'color' => 'cadetblue',
    'format' => true,
]) ?>

&#60;?= keygenqt\panelCount\PanelCount::widget([
    'icon'      => 'fas fa-font',
    'count'     => 19999,
    'title'     => 'My font',
    'up'        => false,
    'color'     => 'darkmagenta'
]) ?>

&#60;?= keygenqt\panelCount\PanelCount::widget([
    'count'     => 19999,
    'title'     => 'My title',
    'color'     => 'tomato'
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
                    License
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