<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\JsAsset;
use frontend\assets\RainbowAsset;

$this->title = 'Keygenqt | ' . $model->getTitle();

JsAsset::register($this);
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
                    Parallax
                </div>
                <div class="panel panel-info">
                    <p>
                        Parallax image html block
                        <br>
                        <br>
                        <a download href="https://keygenqt.com/js/parallax.js">
                            <?= \keygenqt\components\Html::img('images/common/website.png', ['width' => 148]) ?>
                        </a>
                    </p>
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
    .screener-2 .body-text {
        font-size: 34px;
        color: black;
        background: #ffffff94;
        border-radius: 10px;
        z-index: 2;
        position: absolute;
        padding: 20px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .screener-2 .block {
        height: 200px;
    }

    @media (max-width: 550px) {
        .screener-2 .body-text {
            font-size: 14px;
            padding: 10px;
        }
        .screener-2 .block {
            height: 100px;
        }
        .screener-2 .body-text {
            font-size: 14px;
            padding: 10px;
        }
    }
</style>

<div class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">

                <div class="title">
                    Example
                </div>

                <div class="block" id="block1">
                    <div class="body-text">
                        Example
                    </div>
                </div>
                <br>
                <br>
                <div class="block" id="block2">
                    <div class="body-text">
                        text
                    </div>
                </div>
                <br>
                <br>
                <div class="block" id="block3">
                    <div class="body-text">
                        for you
                    </div>
                </div>

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
    <code data-language="php">$(function () {
    $('#block1').parallax({
        image: '/images/common/block1.jpg'
    });

    $('#block2').parallax({
        image: '/images/common/block2.jpg'
    });

    $('#block3').parallax({
        image: '/images/common/block3.jpg'
    });
})</code>
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

<script>
    $(function () {
        $('#block1').parallax({
            image: '/images/common/block1.jpg?v=1',
        });
        $('#block2').parallax({
            image: '/images/common/block2.jpg?v=1',
        });
        $('#block3').parallax({
            image: '/images/common/block3.jpg?v=1',
        });
    })
</script>