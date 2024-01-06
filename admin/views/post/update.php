<?php

/* @var $this yii\web\View */

/* @var $model Post */

use backend\widgets\Alert;
use common\components\Helper;
use common\models\CategoryBlog;
use common\models\Post;
use dosamigos\switchinput\SwitchBox;
use keygenqt\breadcrumbsPanel\BreadcrumbsPanel;
use keygenqt\components\Html;
use keygenqt\imageAjax\ImageAjax;
use keygenqt\sceditor\SCEditor;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$title = $model->is_work ? 'Work' : 'Post';

$this->title = $model->isNewRecord ? "New $title" : "Edit $title";

BreadcrumbsPanel::setParams([
    [
        'label' => $title,
        'url' => ['post/index', 'work' => $model->is_work]
    ], [
        'label' => $this->title
    ],
], 'fa fa-user');

$codes = [];
foreach (Post::$CODES as $key => $item) {
    $codes[$key] = $key;
}

?>

<style>
    .field-blog-title .sceditor-toolbar {
        display: none;
    }
</style>

<?php $form = ActiveForm::begin(Helper::getFormParams()); ?>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10"><?= Alert::widget(); ?></div>
</div>

<?= $form->field($model, 'post_type')->radioList([Post::TYPE_DEFAULT => 'Default', Post::TYPE_FILE => 'File', Post::TYPE_URL => 'Url']) ?>

<?= $form->field($model, 'image')->widget(ImageAjax::classname(), [
    'btnDelete' => false,
    'btnSelect' => 'Choose',
    'url' => ['ajax/upload-image', 'type' => 'blog'],
]) ?>

<?= $form->field($model, 'image_body', ['options' => ['class' => "form-group"]])->widget(ImageAjax::classname(), [
    'btnDelete' => false,
    'btnSelect' => 'Choose',
    'url' => ['ajax/upload-image', 'type' => 'blog-image_body'],
]) ?>

<?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(CategoryBlog::find()->where(['is_work' => $model->is_work])->all(), 'id', 'title')) ?>
<?= $form->field($model, 'code')->dropDownList(ArrayHelper::merge(['' => ''], $codes)) ?>

<?= $form->field($model, 'url', ['options' => ['class' => "form-group"]])->textInput() ?>
<?= $form->field($model, 'url_download', ['options' => ['class' => "form-group"]])->textInput() ?>
<?= $form->field($model, 'url_snapcraft', ['options' => ['class' => "form-group"]])->textInput() ?>
<?= $form->field($model, 'url_repository', ['options' => ['class' => "form-group"]])->textInput() ?>
<?= $form->field($model, 'file_path', ['options' => ['class' => "form-group"]])->textInput() ?>

<?= $form->field($model, 'title')->textarea() ?>
<?= $form->field($model, 'description')->textarea() ?>

<?= $form->field($model, 'text', ['options' => ['class' => "form-group"]])->widget(SCEditor::className(), [
    'jsOption' => [
        'height' => 500,
        'resizeWidth' => false,
        'style' => 'minified/jquery.sceditor.default.min.css',
    ]
]) ?>

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

<?= $form->field($model, 'is_soon')->widget(SwitchBox::className(), [
    'clientOptions' => [
        'inverse' => true,
        'size' => 'normal',
        'onColor' => 'success',
        'offColor' => 'danger',
        'onText' => 'ON',
        'offText' => 'OFF'
    ]
]) ?>

<?= $form->field($model, 'is_user')->widget(SwitchBox::className(), [
    'clientOptions' => [
        'inverse' => true,
        'size' => 'normal',
        'onColor' => 'success',
        'offColor' => 'danger',
        'onText' => 'ON',
        'offText' => 'OFF'
    ]
]) ?>

<?= $form->field($model, 'is_work')->widget(SwitchBox::className(), [
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

<script>
    function updateType(type) {
        switch (type) {
            case '<?= Post::TYPE_DEFAULT ?>':
                $('.field-post-url_download').addClass('hide');
                $('.field-post-url_snapcraft').addClass('hide');
                $('.field-post-url_repository').addClass('hide');
                $('.field-post-file_path').addClass('hide');
                $('.field-post-image_body').removeClass('hide');
                $('.field-post-text').removeClass('hide');
                $('.field-post-url').removeClass('hide');
                break;
            case '<?= Post::TYPE_FILE ?>':
                $('.field-post-url_download').removeClass('hide');
                $('.field-post-url_snapcraft').removeClass('hide');
                $('.field-post-url_repository').removeClass('hide');
                $('.field-post-image_body').addClass('hide');
                $('.field-post-text').addClass('hide');
                $('.field-post-file_path').removeClass('hide');
                $('.field-post-url').removeClass('hide');
                break;
            case '<?= Post::TYPE_URL ?>':
                $('.field-post-url_download').removeClass('hide');
                $('.field-post-url_snapcraft').removeClass('hide');
                $('.field-post-url_repository').removeClass('hide');
                $('.field-post-file_path').addClass('hide');
                $('.field-post-image_body').addClass('hide');
                $('.field-post-text').addClass('hide');
                $('.field-post-url').addClass('hide');
                break;
        }
    }

    $(function () {
        $('input[name="Post[post_type]"]').change(function (e) {
            updateType($(e.target).val())
            $('#w1-error').hide();
            $('.has-error').removeClass('has-error');
        });

        setTimeout(function () { updateType('<?= $model->post_type ?>') }, 50);
    })
</script>



