<?php

/* @var $this yii\web\View */

/* @var $model CategoryBlog */

use backend\widgets\Alert;
use common\components\Helper;
use common\models\CategoryBlog;
use keygenqt\components\Html;
use yii\bootstrap\ActiveForm;

$this->title = $model->isNewRecord ? 'New Category' : 'Edit Category';

\keygenqt\breadcrumbsPanel\BreadcrumbsPanel::setParams([
    [
        'label' => 'Category',
        'url' => ['category-blog/index']
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


<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'order') ?>

<?= $form->field($model, 'is_work')->widget(\dosamigos\switchinput\SwitchBox::className(), [
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



