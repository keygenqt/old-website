<?php

/* @var $this yii\web\View */

/* @var $model \common\models\Post */

use common\models\Post;
use keygenqt\components\Html;
use yii\bootstrap\Button;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Post';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    $this->title
], 'fa fa-user');

echo Button::widget([
    'tagName' => 'a',
    'label' => Html::tag('i', '', ['class' => 'fa fa-plus']) . ' Add Blog',
    'encodeLabel' => false,
    'options' => [
        'class' => 'btn-success btn-add',
        'href' => Url::toRoute(['post/update', 'work' => 0])
    ],
]);

echo \backend\widgets\Alert::widget();

echo GridView::widget([
    'id' => 'grid',
    'layout' => "{items}\n{pager}",
    'dataProvider' => $model->search(Yii::$app->request->getQueryParams()),
    'filterModel' => $model,
    'columns' => [
        [
            'attribute' => 'img',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::tag('div', '', ['style' =>
                    'height: 50px;width: 50px;background-image: url(' . $model->image . ');background-size: cover;background-position: center center;']);
            },
            'contentOptions' => ['style' => 'vertical-align: middle;'],
            'headerOptions' => ['style' => 'width: 70px;'],
        ],
        [
            'attribute' => 'title',
            'format' => 'raw',
            'value' => function ($model) {
                return empty($model->title) ? null : Html::encode($model->getTitle());
            },
            'contentOptions' => ['style' => 'vertical-align: middle;'],
        ],
        [
            'attribute' => 'post_type',
            'format' => 'raw',
            'filter' => [
                'Default',
                'Type File',
                'Type Url',
            ],
            'value' => function ($model) {
                switch ($model->post_type) {
                    case Post::TYPE_DEFAULT:
                        return Html::label("Default", '', ['class' => 'label label-default', 'style' => 'width: 70px; display: inline-block;']);
                    case Post::TYPE_FILE:
                        return Html::label("Type File", '', ['class' => 'label label-primary', 'style' => 'width: 70px; display: inline-block;']);
                    case Post::TYPE_URL:
                        return Html::label("Type Url", '', ['class' => 'label label-success', 'style' => 'width: 70px; display: inline-block;']);
                }
                return '';
            },
            'headerOptions' => ['style' => 'width: 100px;'],
            'contentOptions' => ['style' => 'width: 100px;vertical-align: middle;text-align: center;'],
        ],
        [
            'attribute' => 'blocked',
            'format' => 'raw',
            'filter' => [
                'False',
                'True',
            ],
            'value' => function ($model) {
                return $model->blocked ? Html::label('TRUE', '', ['class' => 'label label-danger']) : Html::label('FALSE', '', ['class' => 'label label-default']);
            },
            'headerOptions' => ['style' => 'width: 100px;'],
            'contentOptions' => ['style' => 'width: 100px;vertical-align: middle;text-align: center;'],
        ],
        [
            'filter' => \keygenqt\datePicker\DatePicker::widget([
                'model' => $model,
                'attribute' => 'created_at',
                'language' => 'en-US',
                'dateFormat' => 'php:d-M-Y',
                'clientOptions' => [
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'dayNamesMin' => array('S', 'M', 'T', 'W', 'T', 'F', 'S')
                ]
            ]),
            'format' => 'html',
            'attribute' => 'created_at',
            'value' => function ($model) {
                return $model->created_at ? date('d-M-Y', $model->created_at) : null;
            },
            'headerOptions' => ['style' => 'width: 165px;'],
            'contentOptions' => ['style' => 'width: 165px;vertical-align: middle;'],
        ],
        [
            'class' => \yii\grid\Column::className(),
            'header' => 'Settings',
            'content' => function ($model) {

                $buttons = Button::widget([
                    'tagName' => 'a',
                    'label' => Html::tag('i', '', ['class' => 'fas fa-pencil-alt']),
                    'encodeLabel' => false,
                    'options' => [
                        'class' => 'btn-primary',
                        'href' => Url::toRoute(['post/update', 'id' => $model->id])
                    ],
                ]);

                $buttons .= Button::widget([
                    'tagName' => 'a',
                    'label' => Html::tag('i', '', ['class' => 'fas fa-trash-alt']),
                    'encodeLabel' => false,
                    'options' => [
                        'class' => 'btn-danger',
                        'href' => 'javascript:void(0)',
                        'onclick' => 'if (confirm("Delete this model?")) window.location.href = "'
                            . Url::toRoute(['post/delete', 'id' => $model->id]) . '"'
                    ],
                ]);

                return $buttons;

            },
            'headerOptions' => ['class' => 'settings', 'style' => 'width: 120px;'],
            'contentOptions' => ['class' => 'grid-btn', 'style' => 'width: 120px;text-align: center;'],
        ],
    ]
]);

?>