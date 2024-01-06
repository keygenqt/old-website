<?php

/* @var $this yii\web\View */

/* @var $model User */

use common\models\User;
use yii\bootstrap\Button;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Users';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    $this->title
], 'fa fa-user');

echo \backend\widgets\Alert::widget();

echo Button::widget([
    'tagName' => 'a',
    'label' => Html::tag('i', '', ['class' => 'fa fa-plus']) . ' Add',
    'encodeLabel' => false,
    'options' => [
        'class' => 'btn-success btn-add',
        'href' => Url::toRoute(['users/update'])
    ],
]);

    echo GridView::widget([
        'id' => 'grid',
        'layout'=>"{items}\n{pager}",
        'dataProvider' => $model->search(Yii::$app->request->getQueryParams()),
        'filterModel' => $model,
        'columns' => [
            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => function ($model) {
                    return empty($model->email) ? null : Html::encode($model->email);
                },
                'contentOptions' => ['style' => 'vertical-align: middle;'],
            ],
            [
                'attribute' => 'blocked',
                'format' => 'raw',
                'filter' => [
                    'False',
                    'True',
                ],
                'value' => function ($model) {
                    return $model->blocked ? Html::label('TRUE', '', ['class' => 'label label-danger']) : Html::label('FALSE', '', ['class' => 'label label-success']);
                },
                'headerOptions' => ['style' => 'width: 165px;'],
                'contentOptions' => ['style' => 'width: 165px;vertical-align: middle;'],
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
                            'href' => Url::toRoute(['users/update', 'id' => $model->id])
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
                                . Url::toRoute(['users/delete', 'id' => $model->id]) . '"'
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