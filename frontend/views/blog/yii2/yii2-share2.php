<?php

/* @var $this yii\web\View */

use frontend\assets\FontAwesomeAssets;
use frontend\assets\RainbowAsset;
use keygenqt\components\Html;
use keygenqt\share2\Share2;
use yii\helpers\Url;

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
                    Yii2 Share
                </div>
                <div class="panel panel-info">

                    <p>
                        An easy way to add buttons soc network share. Widget uses the Yandex <a target="_blank" href="https://yandex.ru/dev/share/">Block "Share"</a>.
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
    "keygenqt/yii2-share2": "*"
}</code>
</pre>

                    <div>
                        of your <a target="_blank" href="https://getcomposer.org/doc/">composer.json</a> file.
                    </div>

                    <div style="font-size: 24px; padding-top: 24px;" class="title">
                        FYI
                    </div>

                    <div>
                        I did not overload all the options, there are a lot of them. Only the most basic. You can find all parameters <a target="_blank"
                                                                                  href="https://tech.yandex.ru/share/doc/dg/add-docpage/">here</a>.
                        <br>
                        <br>
                    </div>

                    <div>
                        Has options:
                        <br>
                        <br>
                    </div>

<pre>
<code data-language="php">const SOC_YA_COLLECTIONS = 'collections';
const SOC_VK = 'vkontakte';
const SOC_FACEBOOK = 'facebook';
const SOC_GPLUS = 'gplus';
const SOC_TWITTER = 'twitter';
const SOC_LINKEDIN = 'linkedin';
const SOC_VIBER = 'viber';
const SOC_WHATSAPP = 'whatsapp';
const SOC_SKYPE = 'skype';
const SOC_TELEGRAM = 'telegram';</code>
</pre>

                    <div>
                        Some social networks do not pay attention to the image parameter passed to them. In this case, <a target="_blank" href="https://developer.mozilla.org/en-US/docs/Web/HTML/microformats">micro-marking</a> should be used.
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

                <?= Share2::widget([
                    'size' => 40,
                    'margin' => 10,
                    'lang' => 'en',

                    'icon_facebook' => '/images/common/fb.png',
                    'icon_twitter' => '/images/common/tw.png',
                    'icon_linkedin' => '/images/common/in.png',

                    'soc' => [Share2::SOC_FACEBOOK, Share2::SOC_TWITTER, Share2::SOC_LINKEDIN],

                    'title' => 'Yii2 Share',
                    'urlImage' => Url::base(true) . '/images/yii2/preview-share2.png',
                    'urlPage' => Url::base(true) . Yii::$app->request->getUrl(),

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
    <code data-language="php">&#60;?php

use keygenqt\share2\Share2;

echo Share2::widget([
    'size' => 40,
    'margin' => 10,
    'lang' => 'en',

    'icon_facebook' => '/images/common/fb.png',
    'icon_twitter' => '/images/common/tw.png',
    'icon_linkedin' => '/images/common/in.png',

    'soc' => [Share2::SOC_FACEBOOK, Share2::SOC_TWITTER, Share2::SOC_LINKEDIN],

    'title' => 'Yii2 Share',
    'urlImage' => Url::base(true) . '/images/yii2/preview-share2.png',
    'urlPage' => Url::base(true) . Yii::$app->request->getUrl(),

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