<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\RainbowAsset;
use keygenqt\verticalMenu\VerticalMenu;

$this->title = 'Keygenqt | ' . $model->getTitle();

FontAwesomeAssets::register($this);
RainbowAsset::register($this);


echo VerticalMenu::widget([
    'title' => 'KeyGenQt',
    'subtitle' => 'Admin panel',
    'titleUrl' => '#',
    'width' => 350,
    'side' => 'left',
    'itemsFront' => [
        [
            'url' => '#',
            'icon' => 'fas fa-sign-out-alt',
            'color' => '#2cb6e9',
            'options' => [
                'style' => '
                                        padding-top: 24px;'
            ],
        ],
    ],
    'items' => [
        [
            'label' => 'Dashboard',
            'url' => '#',
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Multimedia',
            'items' => [
                [
                    'label' => 'Music',
                    'url' => '#',
                    'active' => true
                ],
                [
                    'label' => 'Video',
                    'url' => '#',
                ],
                [
                    'label' => 'Podcast',
                    'url' => '#',
                ],
            ]
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Translations',
            'items' => [
                [
                    'label' => 'Books',
                    'url' => '#',
                ],
                [
                    'label' => 'Post',
                    'url' => '#',
                ],
            ]
        ],
    ]
]);

echo VerticalMenu::widget([
    'title' => 'KeyGenQt',
    'subtitle' => 'Admin panel',
    'titleUrl' => '#',
    'width' => 350,
    'side' => 'right',
    'itemsFront' => [
        [
            'url' => '#',
            'icon' => 'fas fa-sign-out-alt',
            'color' => '#2cb6e9',
            'options' => [
                'style' => '
                                        padding-top: 24px;'
            ],
        ],
    ],
    'items' => [
        [
            'label' => 'Dashboard',
            'url' => '#',
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Multimedia',
            'items' => [
                [
                    'label' => 'Music',
                    'url' => '#',
                    'active' => true
                ],
                [
                    'label' => 'Video',
                    'url' => '#',
                ],
                [
                    'label' => 'Podcast',
                    'url' => '#',
                ],
            ]
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Translations',
            'items' => [
                [
                    'label' => 'Books',
                    'url' => '#',
                ],
                [
                    'label' => 'Post',
                    'url' => '#',
                ],
            ]
        ],
    ]
]);

?>

<style>
    /*fix frontend*/

    .blog-view .body {
        margin-top: 30px;
    }
    .blog-view .title {
        display: none;
    }

    .button-theme,
    .button-up {
        display: none !important;
    }

    .vertical-menu-right .header-menu-right-vertical,
    .vertical-menu-right .vertical-menu-right-show ul li,
    .vertical-menu .header-menu-vertical,
    .vertical-menu .vertical-menu-show ul li {
        height: 72px;
    }

    .vertical-menu-right .vertical-menu-show ul li,
    .vertical-menu .vertical-menu-show ul li {
        padding-top: 19px;
    }

    .vertical-menu-right .vertical-menu-right-hide,
    .vertical-menu .vertical-menu-hide {
        padding-top: 72px;
    }
    .vertical-menu-right .vertical-menu-right-show ul:nth-child(2),
    .vertical-menu .vertical-menu-show ul:nth-child(2) {
        top: 72px;
    }
    @media (max-width: 600px){
        .blog-view .body ol, .blog-view .body ul {
             margin-top: 0;
             padding-left: 0;
        }
    }
    @media (max-width: 960px){
        .screener-1, .screener-2 {
            display: none;
        }
    }
    @media (max-width: 680px){
        .vertical-menu,
        .vertical-menu-right {
            display: none;
        }
        body {
            padding-right: 0;
            padding-left: 0;
        }
    }
    @media (max-width: 510px){
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
                    Vertical Menu
                </div>
                <div class="panel panel-info">

                    <p>
                        Vertical Menu right/left position for admin panel or other areas on yii2.
                        <br>
                        <br>
                    </p>

                    <div style="font-size: 24px;" class="title">
                        Installation
                    </div>

                    <div>
                        The preferred way to install this extension is through <a target="_blank" href="http://getcomposer.org/download/">composer</a>.
                        <br>
                        <br>
                        Either add
                        <br>
                        <br>
                    </div>

                    <pre>
    <code data-language="php">"require": {
    "keygenqt/yii2-vertical-menu": "*"
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
                    Menu Left:
                </div>
                <div class="panel panel-info">

<pre>
    <code data-language="php">\keygenqt\verticalMenu\echo VerticalMenu::widget([
    'title' => 'KeyGenQt',
    'subtitle' => 'Admin panel',
    'titleUrl' => '#',
    'width' => 350,
    'side' => 'left',
    'itemsFront' => [
        [
            'url' => '#',
            'icon' => 'fas fa-sign-out-alt',
            'color' => '#2cb6e9',
            'options' => [
                'style' => '
                                        padding-top: 24px;'
            ],
        ],
    ],
    'items' => [
        [
            'label' => 'Dashboard',
            'url' => '#',
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Multimedia',
            'items' => [
                [
                    'label' => 'Music',
                    'url' => '#',
                    'active' => true
                ],
                [
                    'label' => 'Video',
                    'url' => '#',
                ],
                [
                    'label' => 'Podcast',
                    'url' => '#',
                ],
            ]
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Translations',
            'items' => [
                [
                    'label' => 'Books',
                    'url' => '#',
                ],
                [
                    'label' => 'Post',
                    'url' => '#',
                ],
            ]
        ],
    ]
]);</code>
</pre>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .screener-2 .block-index {
        background: #727684;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
    }

    .screener-2 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }
</style>

<div class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    Menu Right:
                </div>
                <div class="panel panel-info">

<pre>
    <code data-language="php">\keygenqt\verticalMenu\echo VerticalMenu::widget([
    'title' => 'KeyGenQt',
    'subtitle' => 'Admin panel',
    'titleUrl' => '#',
    'width' => 350,
    'side' => 'right',
    'itemsFront' => [
        [
            'url' => '#',
            'icon' => 'fas fa-sign-out-alt',
            'color' => '#2cb6e9',
            'options' => [
                'style' => '
                                        padding-top: 24px;'
            ],
        ],
    ],
    'items' => [
        [
            'label' => 'Dashboard',
            'url' => '#',
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Multimedia',
            'items' => [
                [
                    'label' => 'Music',
                    'url' => '#',
                    'active' => true
                ],
                [
                    'label' => 'Video',
                    'url' => '#',
                ],
                [
                    'label' => 'Podcast',
                    'url' => '#',
                ],
            ]
        ],
        [
            'label' => '<i class="fas fa-caret-down"></i> Translations',
            'items' => [
                [
                    'label' => 'Books',
                    'url' => '#',
                ],
                [
                    'label' => 'Post',
                    'url' => '#',
                ],
            ]
        ],
    ]
]);</code>
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