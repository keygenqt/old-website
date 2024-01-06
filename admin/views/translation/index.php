<?php

/* @var $this yii\web\View */

/* @var $model Translation */

use backend\widgets\Alert;
use common\models\Translation;
use yii\bootstrap\Button;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Translations';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    $this->title
], 'fa fa-user');

echo Button::widget([
    'tagName' => 'a',
    'label' => Html::tag('i', '', ['class' => 'fa fa-plus']) . ' Add',
    'encodeLabel' => false,
    'options' => [
        'class' => 'btn-success btn-add',
        'href' => Url::toRoute(['translation/update'])
    ],
]);

echo Alert::widget();

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
                return empty($model->title) ? null : Html::encode($model->title);
            },
            'contentOptions' => ['style' => 'vertical-align: middle;'],
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
            'attribute' => 'order',
            'format' => 'raw',
            'filter' => false,
            'value' => function ($model) {
                return Html::label($model->order, '', ['class' => 'label label-primary', 'style' => 'width: 45px; display: inline-block;']);
            },
            'headerOptions' => ['style' => 'width: 70px;'],
            'contentOptions' => ['style' => 'width: 70px;vertical-align: middle;text-align: center;'],
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
                        'href' => Url::toRoute(['translation/update', 'id' => $model->id])
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
                            . Url::toRoute(['translation/delete', 'id' => $model->id]) . '"'
                    ],
                ]);

                return $buttons;

            },
            'headerOptions' => ['class' => 'settings', 'style' => 'width: 120px;vertical-align: middle;'],
            'contentOptions' => ['class' => 'grid-btn', 'style' => 'width: 120px;text-align: center;vertical-align: middle;'],
        ],
    ]
]);

?>