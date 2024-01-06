<?php

/* @var $this yii\web\View */

use common\models\Post;
use common\models\Sentence;
use common\models\Statistics;
use common\models\Translation;
use common\models\TranslationData;
use keygenqt\highcharts\Highcharts;
use keygenqt\panelCount\PanelCount;

$this->title = 'Dashboard';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    $this->title
], 'fas fa-tachometer-alt');

?>

<style>
    .yii2-breadcrumbs-panel .content-panel .breadcrumbs-cell {
        padding-bottom: 0;
    }

    .row-colors .col-md-3:nth-child(1) .yii2-panel-count {
        border: 1px solid #036996;
        background: #03c4ff;
        color: #03393f;
    }

    .row-colors .col-md-3:nth-child(2) .yii2-panel-count {
        border: 1px solid #502A1B;
        background: #e08b40;
        color: #260808;
    }

    .row-colors .col-md-3:nth-child(3) .yii2-panel-count {
        border: 1px solid #875649;
        background: #eadad5;
        color: #372619;
    }

    .row-colors .col-md-3:nth-child(4) .yii2-panel-count {
        border: 1px solid #0E395B;
        background: #a4dbff;
        color: #091b2d;
    }
</style>

<div class="index">

    <div class="well">
        <h1 style="margin-top: 10px;">Welcome!</h1>
    </div>

    <div class="row">
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Sum site clicks',
                'icon' => 'fas fa-book',
                'count' => (int)Statistics::find()
                    ->andWhere(['!=', 'ip', '192.168.1.1'])
                    ->andWhere(['!=', 'ip', '127.0.0.1'])
                    ->sum('count'),
                'color' => 'tomato'
            ]) ?>
        </div>
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Sum INDEX clicks',
                'icon' => 'fas fa-file-alt',
                'count' => (int)Statistics::find()
                    ->where(['key' => 'site-index'])
                    ->andWhere(['!=', 'ip', '192.168.1.1'])
                    ->andWhere(['!=', 'ip', '127.0.0.1'])
                    ->sum('count'),
                'color' => 'darkmagenta'
            ]) ?>
        </div>
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Blog',
                'icon' => 'fas fa-bookmark',
                'count' => (int)Post::find()->where(['is_work' => 0, 'blocked' => 0])->count(),
                'color' => 'cadetblue'
            ]) ?>
        </div>
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Sentences ENG',
                'icon' => 'fas fa-font',
                'count' => Sentence::find()->count(),
            ]) ?>
        </div>
    </div>

    <div class="row row-colors">
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Unique site clicks',
                'icon' => 'fas fa-briefcase',
                'count' => (int)Statistics::find()
                    ->andWhere(['!=', 'ip', '192.168.1.1'])
                    ->andWhere(['!=', 'ip', '127.0.0.1'])->count(),
            ]) ?>
        </div>
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Unique INDEX clicks',
                'icon' => 'fas fa-font',
                'count' => (int)Statistics::find()
                    ->where(['key' => 'site-index'])
                    ->andWhere(['!=', 'ip', '192.168.1.1'])
                    ->andWhere(['!=', 'ip', '127.0.0.1'])
                    ->count(),
                'color' => 'darkmagenta'
            ]) ?>
        </div>
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Work',
                'icon' => 'fas fa-eye',
                'count' => (int)Post::find()->where(['is_work' => 1, 'blocked' => 0])->count(),
                'color' => 'cadetblue'
            ]) ?>
        </div>
        <div class="col-md-3" style="padding-bottom: 0;">
            <?= PanelCount::widget([
                'title' => 'Sentences RU',
                'icon' => 'fas fa-eye',
                'count' => (int)Sentence::find()->where(['IS NOT', 'ru', null])->count(),
                'color' => 'tomato'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= Highcharts::widget([
                'jsOption' => [
                    'chart' => [
                        'type' => 'column',
                        'plotBackgroundColor' => null,
                        'plotBorderWidth' => null,
                        'plotShadow' => false
                    ],
                    'title' => [
                        'text' => 'Unique Statistics View'
                    ],
                    'xAxis' => [
                        'allowDecimals' => true,
                        'categories' => [
                            'Index', 'Blog', 'Work', 'Utils', 'Web'
                        ]
                    ],
                    'series' => [
                        [
                            'showInLegend' => false,
                            'data' => [
                                [
                                    'y' => (int)Statistics::find()
                                        ->where(['key' => 'site-index'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->count(),
                                    'color' => '#036996',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'is_work', '0'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->count(),
                                    'color' => '#371102',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'is_work', '1'])
                                        ->andWhere(['!=', 'key', 'blog-view-30'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->count(),
                                    'color' => '#82C1CC',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'is_work', '1'])
                                        ->andWhere(['=', 'category_id', '14'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->count(),
                                    'color' => '#034219',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'is_work', '1'])
                                        ->andWhere(['=', 'category_id', '10'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->count(),
                                    'color' => '#E08B40',
                                ],
                            ],
                        ],
                    ]
                ]]); ?>
        </div>

        <div class="col-md-6">
            <?= Highcharts::widget([
                'jsOption' => [
                    'chart' => [
                        'type' => 'column',
                        'plotBackgroundColor' => null,
                        'plotBorderWidth' => null,
                        'plotShadow' => false
                    ],
                    'title' => [
                        'text' => 'Sum Statistics View'
                    ],
                    'xAxis' => [
                        'allowDecimals' => true,
                        'categories' => [
                            'Index', 'Blog', 'Work', 'Utils', 'Web'
                        ]
                    ],
                    'series' => [
                        [
                            'showInLegend' => false,
                            'data' => [
                                [
                                    'y' => (int)Statistics::find()
                                        ->where(['key' => 'site-index'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->sum('count'),
                                    'color' => '#036996',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'is_work', '0'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->sum('count'),
                                    'color' => '#371102',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'is_work', '1'])
                                        ->andWhere(['!=', 'key', 'blog-view-30'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->sum('count'),
                                    'color' => '#82C1CC',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'category_id', '14'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->sum('count'),
                                    'color' => '#034219',
                                ],
                                [
                                    'y' => (int)Statistics::find()
                                        ->innerJoin('posts', 'model_id=posts.id')
                                        ->where(['like', 'key', 'blog-view-%', false])
                                        ->andWhere(['=', 'category_id', '10'])
                                        ->andWhere(['!=', 'ip', '192.168.1.1'])
                                        ->andWhere(['!=', 'ip', '127.0.0.1'])
                                        ->sum('count'),
                                    'color' => '#E08B40',
                                ],
                            ],
                        ],
                    ]
                ]]); ?>
        </div>

    </div>

    <div class="row">
        <div style="height: 20px;"></div>
    </div>
</div>

<script>
    $(function () {
        setTimeout(function () {
            window.dispatchEvent(new Event('resize'));
        }, 10);
    })
</script>