<?php

/* @var $this yii\web\View */

/* @var $model Translation */

use backend\widgets\Alert;
use common\components\Helper;
use common\models\Translation;
use keygenqt\components\Html;
use yii\bootstrap\ActiveForm;

$this->title = $model->isNewRecord ? 'New Translation' : 'Edit Translation';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    [
        'label' => 'Translations',
        'url' => ['translation/index']
    ], [
        'label' => $this->title
    ],
], 'fa fa-user');
?>

<?php $form = ActiveForm::begin(Helper::getFormParams()); ?>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10"><?= Alert::widget(); ?></div>
</div>

<?= $form->field($model, 'image')->widget(\keygenqt\imageAjax\ImageAjax::classname(), [
    'btnDelete' => false,
    'btnSelect' => 'Choose',
    'url' => ['ajax/upload-image', 'type' => 'translation'],
]) ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'author') ?>
<?= $form->field($model, 'order') ?>
<?= $form->field($model, 'is_user')->widget(\dosamigos\switchinput\SwitchBox::className(), [
    'clientOptions' => [
        'inverse' => true,
        'size' => 'normal',
        'onColor' => 'success',
        'offColor' => 'danger',
        'onText' => 'ON',
        'offText' => 'OFF'
    ]
]) ?>

<div class="form-bottom-box">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>



