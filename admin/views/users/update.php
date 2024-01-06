<?php

/* @var $this yii\web\View */

/* @var $model User */

use backend\widgets\Alert;
use common\components\Helper;
use common\models\User;
use dosamigos\switchinput\SwitchBox;
use keygenqt\components\Html;
use yii\bootstrap\ActiveForm;

$this->title = $model->isNewRecord ? 'New User' : 'Edit User';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    [
        'label' => 'Users',
        'url' => ['users/index']
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

<?php if ($model->isNewRecord): ?>
    <?= $form->field($model, 'email') ?>
<?php else: ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'blocked')->widget(SwitchBox::className(), [
        'clientOptions' => [
            'inverse' => true,
            'size' => 'normal',
            'onColor' => 'success',
            'offColor' => 'danger',
            'onText' => 'ON',
            'offText' => 'OFF'
        ]
    ]) ?>
    <hr>
    <?php echo $form->field($model, '_password')->label('Update password') ?>
<?php endif; ?>

<?= $form->field($model, 'is_admin')->widget(SwitchBox::className(), [
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



