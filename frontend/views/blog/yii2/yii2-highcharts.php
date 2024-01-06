<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\RainbowAsset;
use keygenqt\highcharts\Highcharts;

$this->title = 'Keygenqt | ' . $model->getTitle();

FontAwesomeAssets::register($this);
RainbowAsset::register($this);

?>

<style>
    /*fix frontend*/
    .blog-view .body {
        margin-top: 30px;
        display: block;
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
                    HighCharts
                </div>
                <div class="panel panel-info">

                    <p>
                        Extension yii for library <a href="https://www.highcharts.com/" target="_blank">HighCharts</a>
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
    "keygenqt/yii2-highcharts": "*"
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

                <?= Highcharts::widget([
                    'jsOption' => [
                        'chart' => [
                            'type' => 'column',
                            'plotBackgroundColor' => null,
                            'plotBorderWidth' => null,
                            'plotShadow' => false
                        ],
                        'title' => [
                            'text' => 'Statistics'
                        ],
                        'xAxis' => [
                            'allowDecimals' => true,
                            'categories' => [
                                'Download', 'Upload', 'Compress', 'Validate'
                            ]
                        ],
                        'series' => [
                            [
                                'showInLegend' => false,
                                'data' => [
                                    [
                                        'y' => 134,
                                        'color' => '#D6251F',
                                    ],
                                    [
                                        'y' => 100,
                                        'color' => '#26ABDB',
                                    ],
                                    [
                                        'y' => 10,
                                        'color' => '#33BDA4',
                                    ],
                                    [
                                        'y' => 50,
                                        'color' => '#51078D',
                                    ],
                                ],
                            ],
                        ]
                    ]]);
                ?>

                <br>
                <br>

                <?= Highcharts::widget([
                    'jsOption' => [
                        'chart' => [
                            'plotBackgroundColor' => null,
                            'plotBorderWidth' => null,
                            'plotShadow' => false
                        ],
                        'title' => [
                            'text' => 'Statistics'
                        ],
                        'plotOptions' => [
                            'pie' => [
                                'allowPointSelect' => true,
                                'cursor' => 'pointer',
                                'dataLabels' => [
                                    'enabled' => false
                                ],
                                'showInLegend' => true
                            ]
                        ],
                        'series' => [[
                            'type' => 'pie',
                            'data' => [
                                [
                                    'name' => 'ENG',
                                    'y' => 200,
                                    'color' => '#1E5E61'
                                ],
                                [
                                    'name' => 'RU',
                                    'y' => 100,
                                    'color' => '#C8F1F3'
                                ],
                            ],
                        ]]
                    ]]);
                ?>

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
    <code data-language="php">use \keygenqt\highcharts\Highcharts;

&#60;?= Highcharts::widget([
'jsOption' => [
    'chart' => [
        'type' => 'column',
        'plotBackgroundColor' => null,
        'plotBorderWidth' => null,
        'plotShadow' => false
    ],
    'title' => [
        'text' => 'Statistics'
    ],
    'xAxis' => [
        'allowDecimals' => true,
        'categories' => [
            'Download', 'Upload', 'Compress', 'Validate'
        ]
    ],
    'series' => [
        [
            'showInLegend' => false,
            'data' => [
                [
                    'y' => 134,
                    'color' => '#D6251F',
                ],
                [
                    'y' => 100,
                    'color' => '#26ABDB',
                ],
                [
                    'y' => 10,
                    'color' => '#33BDA4',
                ],
                [
                    'y' => 50,
                    'color' => '#51078D',
                ],
            ],
        ],
    ]
]]);
?></code>
</pre>

<pre style="margin-bottom: 0;">
    <code data-language="php">use \keygenqt\highcharts\Highcharts;

&#60;?= Highcharts::widget([
    'jsOption' => [
        'chart' => [
            'plotBackgroundColor' => null,
            'plotBorderWidth' => null,
            'plotShadow' => false
        ],
        'title' => [
            'text' => 'Statistics'
        ],
        'plotOptions' => [
            'pie' => [
                'allowPointSelect' => true,
                'cursor' => 'pointer',
                'dataLabels' => [
                    'enabled' => false
                ],
                'showInLegend' => true
            ]
        ],
        'series' => [[
            'type' => 'pie',
            'data' => [
                [
                    'name' => 'ENG',
                    'y' => 200,
                    'color' => '#1E5E61'
                ],
                [
                    'name' => 'RU',
                    'y' => 100,
                    'color' => '#C8F1F3'
                ],
            ],
        ]]
    ]]);
?></code>
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
                    License HighCharts
                </div>
                <div class="panel panel-info">
                    The libraries are available under different licenses depending on whether it is intended for commercial/government use, or for a personal or non-profit project.
                    <br>
                    <br>
                    Read more on licensing alternatives here:
                    <a target="_blank" href="https://shop.highsoft.com/highcharts">Highcharts</a>
                </div>
            </div>
        </div>
    </div>
</div>