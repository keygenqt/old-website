<?php

/* @var $this yii\web\View */

/* @var $model TranslationData */

/* @var $sentence Sentence */

use backend\widgets\Alert;
use common\components\Helper;
use common\models\Sentence;
use common\models\Translation;
use common\models\TranslationData;
use keygenqt\components\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Button;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = $model->isNewRecord ? 'New Data' : 'Edit Data';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    [
        'label' => 'Translations Data',
        'url' => ['translation-data/index']
    ], [
        'label' => $this->title
    ],
], 'fa fa-user');
?>

<style>
    #grid-filters {
        display: none;
    }

    .grid-view textarea {
        display: block;
        width: 100%;
        padding: 6px 12px;
        line-height: 1.42857143;
        color: #555555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: 125px;
        font-size: 16px;
    }

    .grid-view input {
        display: block;
        width: 100%;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: 34px;
        text-align: center;
    }

    .table {
        display: block;
    }

    .table tbody {
        display: block;
    }

    .table thead {
        display: block;
    }

    .grid-view thead tr {
        display: block;
        width: 100%;
    }

    .grid-view .summary {
        padding-bottom: 20px;
        font-size: 16px;
    }

    .grid-view tbody tr {
        display: block;
        width: 100%;
    }

    .grid-view tbody tr td {
        display: inline-block;
        border: none;
    }

    .grid-view thead tr th {
        display: inline-block;
        border: none;
    }

    .grid-view thead tr th:nth-child(1),
    .grid-view tbody tr td:nth-child(1),
    .grid-view thead tr th:nth-child(2),
    .grid-view tbody tr td:nth-child(2) {
        width: calc(50% - 135px);
    }

    .grid-view thead tr th:nth-child(3),
    .grid-view tbody tr td:nth-child(3) {
        width: 70px;
        text-align: center;
    }

    .grid-view thead tr th:nth-child(4),
    .grid-view tbody tr td:nth-child(4) {
        width: 125px;
        text-align: center;
    }

    .grid-view thead tr th:nth-child(5),
    .grid-view tbody tr td:nth-child(5) {
        width: 70px;
        text-align: center;
    }
</style>

<?php $form = ActiveForm::begin(Helper::getFormParams()); ?>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10"><?= Alert::widget(); ?></div>
</div>

<?= $form->field($model, 'translation_id')->dropDownList(ArrayHelper::map(Translation::find()->all(), 'id', 'title')) ?>
<?= $form->field($model, 'url') ?>
<?= $form->field($model, 'title') ?>

<hr>

<?= $form->field($model, '_is_audio')->widget(\dosamigos\switchinput\SwitchBox::className(), [
    'clientOptions' => [
        'inverse' => true,
        'size' => 'normal',
        'onColor' => 'success',
        'offColor' => 'danger',
        'onText' => 'ON',
        'offText' => 'OFF'
    ]
]) ?>

<div class="audio <?php if (!$model->_is_audio): ?>hide<?php endif; ?>">
    <?= $form->field($model, 'audio_index') ?>
    <?= $form->field($model, 'audio_full_name') ?>
    <?= $form->field($model, 'audio_author_name') ?>
    <?= $form->field($model, 'video_author_url') ?>
</div>

<?php if (!$model->isNewRecord): ?>
    <hr>

    <?= $form->field($model, '_is_add')->widget(\dosamigos\switchinput\SwitchBox::className(), [
        'clientOptions' => [
            'inverse' => true,
            'size' => 'normal',
            'onColor' => 'success',
            'offColor' => 'danger',
            'onText' => 'ON',
            'offText' => 'OFF'
        ]
    ]) ?>

    <div class="add <?php if (!$model->_is_add): ?>hide<?php endif; ?>">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div id="w1-info" class="alert-info alert fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    After add will need update order
                </div>
            </div>
        </div>

        <?php echo $form->field($model, 'eng')->textarea() ?>
        <?php echo $form->field($model, 'ru')->textarea() ?>

        <?= $form->field($model, 'paragraph')->widget(\dosamigos\switchinput\SwitchBox::className(), [
            'clientOptions' => [
                'inverse' => true,
                'size' => 'normal',
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText' => 'ON',
                'offText' => 'OFF'
            ]
        ]) ?>
    </div>

<?php endif; ?>


<hr>

<?= $form->field($model, '_is_parse')->widget(\dosamigos\switchinput\SwitchBox::className(), [
    'clientOptions' => [
        'inverse' => true,
        'size' => 'normal',
        'onColor' => 'success',
        'offColor' => 'danger',
        'onText' => 'ON',
        'offText' => 'OFF'
    ]
]) ?>

<div class="parser <?php if (!$model->_is_parse): ?>hide<?php endif; ?>">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <div id="w1-info" class="alert-danger alert fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                All data will <b>rewrite!</b>
            </div>
        </div>
    </div>

    <?php echo $form->field($model, '_parser')->textarea()->label('Parse chapter') ?>
</div>

<div class="form-bottom-box" style="margin-bottom: 20px;">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

<script>
    $(function () {
        $('#translationdata-_is_audio').on('switchChange.bootstrapSwitch', function (e, data) {
            if (data) {
                $('.audio').removeClass('hide');
            } else {
                $('.audio').addClass('hide');
            }
        });

        $('#translationdata-_is_parse').on('switchChange.bootstrapSwitch', function (e, data) {
            if (data) {
                $('.parser').removeClass('hide');
            } else {
                $('.parser').addClass('hide');
            }
        });

        $('#translationdata-_is_add').on('switchChange.bootstrapSwitch', function (e, data) {
            if (data) {
                $('.add').removeClass('hide');
            } else {
                $('.add').addClass('hide');
            }
        });

        $(document).on("pjax:success", function (event, data, status, xhr, options) {
            gridSave();
        });

        gridSave();

        function gridSave() {

            $('.pagination li a').click(function () {
                setTimeout(function () {
                    $('html, body').animate({scrollTop: $('.summary').offset().top - 15}, 500);
                }, 200);
            });

            $(".grid-view input").keypress(function () {
                if ($(this).css('border-color') !== '#ffa131') {
                    $(this).css('border-color', '#ffa131')
                }
            });
            $(".grid-view textarea").keypress(function () {
                if ($(this).css('border-color') !== '#ffa131') {
                    $(this).css('border-color', '#ffa131')
                }
            });

            $('.grid-delete').on('click', function (e, data) {
                if (confirm("Delete this model?")) {
                    $.ajax({
                        url: "<?= Url::to(['ajax/translation-delete']) ?>",
                        data: {'id': $(e.target).closest('tr').data('key')},
                        success: function (result) {
                            if (result.success === undefined) {
                                $.pjax.reload({container: '#formgrid'});
                            }
                        }
                    });
                }
            });

            $('[name="paragraph"]').on('switchChange.bootstrapSwitch', function (e, data) {
                const id = $(e.target).attr('id').replace('paragraph-', '');
                $.ajax({
                    url: "<?= Url::to(['ajax/translation-paragraph']) ?>",
                    data: {'id': id, 'params': data},
                    success: function (result) {
                        console.log(result)
                    }
                });
            });

            $('.grid-save').on('click', function (e, data) {

                let id = $(e.target).closest('tr').data('key');

                const eng = $('#eng-' + id).val().trim();
                const ru = $('#ru-' + id).val().trim();
                const order = $('#order-' + id).val().trim();

                $(e.target).closest('tr').find('.grid-save').hide();
                $(e.target).closest('tr').find('.grid-update').show();

                $.ajax({
                    dataType: "json",
                    type: 'POST',
                    url: "<?= Url::to(['ajax/translation-data', 'id' => 'value']) ?>".replace('value', id),
                    data: {'Sentence': {'eng': eng, 'ru': ru, 'order': order}},
                    success: function (result) {
                        if (result.success === undefined) {
                            $(e.target).closest('tr').find('input').css('border-color', '#a94442')
                            $(e.target).closest('tr').find('textarea').css('border-color', '#a94442')
                        }
                        setTimeout(function () {
                            $.pjax.reload({container: '#formgrid'});
                        }, result.success === undefined ? 1500 : 500);

                    }
                });
            });
        }
    })
</script>

<?php if (!$model->isNewRecord): ?>
    <?php \yii\widgets\Pjax::begin(['id' => 'formgrid']); ?>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">

            <?= GridView::widget([
                'id' => 'grid',
                'layout' => "{summary}\n{items}\n{pager}",
                'dataProvider' => $sentence->search(Yii::$app->request->getQueryParams(), $model->id),
                'filterModel' => false,
                'columns' => [
                    [
                        'attribute' => 'eng',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::textarea('', $model->eng, ['id' => 'eng-' . $model->id]);
                        },
                    ],
                    [
                        'attribute' => 'ru',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::textarea('', $model->ru, ['id' => 'ru-' . $model->id]);
                        },
                    ],
                    [
                        'attribute' => 'order',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::input('', '', $model->order, ['id' => 'order-' . $model->id]);
                        },
                    ],
                    [
                        'attribute' => 'paragraph',
                        'format' => 'raw',
                        'content' => function ($model) {
                            return \dosamigos\switchinput\SwitchBox::widget([
                                'id' => 'paragraph-' . $model->id,
                                'name' => 'paragraph',
                                'checked' => $model->paragraph == 1,
                                'clientOptions' => [
                                    'inverse' => true,
                                    'size' => 'normal',
                                    'onColor' => 'success',
                                    'offColor' => 'danger',
                                    'onText' => 'ON',
                                    'offText' => 'OFF'
                                ]
                            ]);
                        },
                    ],
                    [
                        'class' => \yii\grid\Column::className(),
                        'header' => 'Settings',
                        'content' => function ($model) {

                            $buttons = Button::widget([
                                'tagName' => 'a',
                                'label' => Html::tag('i', '', ['class' => 'fas fa-save']),
                                'encodeLabel' => false,
                                'options' => [
                                    'class' => 'btn-success grid-save',
                                    'href' => 'javascript:void(0)',
                                ],
                            ]);

                            $buttons .= Button::widget([
                                'tagName' => 'a',
                                'label' => Html::tag('i', '', ['class' => 'fas fa-clock']),
                                'encodeLabel' => false,
                                'options' => [
                                    'class' => 'btn-default grid-update',
                                    'href' => 'javascript:void(0)',
                                    'style' => 'display: none;'
                                ],
                            ]);

                            $buttons .= Button::widget([
                                'tagName' => 'a',
                                'label' => Html::tag('i', '', ['class' => 'fas fa-trash-alt']),
                                'encodeLabel' => false,
                                'options' => [
                                    'class' => 'btn-danger grid-delete',
                                    'href' => 'javascript:void(0)',
                                    'style' => 'margin-top: 10px;'
                                ],
                            ]);

                            return $buttons;

                        },
                    ],
                ]
            ]);
            ?>

        </div>
    </div>
    <?php \yii\widgets\Pjax::end(); ?>
<?php endif; ?>
