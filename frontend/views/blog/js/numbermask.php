<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\JsAsset;
use frontend\assets\RainbowAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Keygenqt | ' . $model->getTitle();

JsAsset::register($this);
RainbowAsset::register($this);

$model = $params['testModel'];

?>

<style>
    /*fix frontend*/

    .blog-view .body {
        margin-top: 30px;
    }

    .blog-view .title {
        display: none;
    }

    @media (max-width: 1040px) {
        .screener-1 {
            display: none;
        }
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
                    NumberMask
                </div>
                <div class="panel panel-info">
                    <p>
                        Jquery plugin for mask desktop browsers input
                        <br>
                        <br>
                        <a download="numbermask" href="https://keygenqt.com/js/numbermask.js">
                            <?= \keygenqt\components\Html::img('images/common/website.png', ['width' => 148]) ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-4 .block-index {
        background: #0b2906;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
    }

    .screener-4 .panel.panel-success {
        border: 1px solid #ffffff;
        background: #336333;
        color: #ffffff;
        padding: 10px;
    }
</style>

<?php if (Yii::$app->session->getFlash('success') != null): ?>
    <div class="page-row screener-4">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <div class="panel panel-success">
                        Form update successfully
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<style>
    .screener-2 .block-index {
        background: #ffffff;
        padding: 30px;
        color: #000000;
        border: 1px solid #727684;
        margin-bottom: 30px;
    }

    .screener-2 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }

    body.black .blog-view .screener-2 .title,
    body.black form .form-group label.control-label {
        color: #4F5364;
    }

    body.black form .form-group.has-error label.control-label {
        color: #F82A5A;
    }

    .screener-2 form .form-group {
        margin-bottom: 15px;
    }

    .screener-2 form .form-group label.control-label {
        font-size: 16px;
        display: inline-block;
        margin-bottom: 5px;
    }

    .screener-2 .error-summary {
        background: #79000f;
        font-size: 16px;
    }

    .form-group .btn {
        width: 10%;
    }

    .screener-2 form .form-group.field-testmodel-json {
        margin-bottom: 15px;
        border: 1px solid #CCCCCC;
        padding: 13px;
    }

    .screener-2 form .form-group.field-testmodel-json.has-error {
        margin-bottom: 15px;
        border: 1px solid #F82A5A;
        padding: 13px;
    }
</style>

<div class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">

                <div class="title">
                    Example
                </div>

                <div id="error-temp">

                </div>

                <?php yii\widgets\Pjax::begin(['id' => 'number-mask']) ?>

                <?php $form = ActiveForm::begin([
                    'enableClientValidation' => false,
                    'enableAjaxValidation' => false,
                    'encodeErrorSummary' => false,
                    'options' => [
                        'id' => 'form-mask',
                        'data-pjax' => true,
                        'autocomplete' => 'off'
                    ]
                ]); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'phone')->textInput()->input('text') ?>
                <?= $form->field($model, 'card')->textInput()->input('text') ?>
                <?= $form->field($model, 'cvc')->textInput()->input('text') ?>

                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>

                <?php Pjax::end(); ?>

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
                    JS code
                </div>
                <div class="panel panel-info">

<pre>
<code data-language="javascript">$(function () {

    $('#testmodel-phone').numbermask({
        mask: "+# (###) ###-##-##"
    });

    $('#testmodel-card').numbermask({
        mask: "####-####-####-####"
    });

    $('#testmodel-cvc').numbermask({
        mask: "###"
    });

});</code>
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
                    License
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

<script>
    function f() {
        $('#testmodel-phone').numbermask({
            mask: "+# (###) ###-##-##"
        });
        $('#testmodel-card').numbermask({
            mask: "####-####-####-####"
        });
        $('#testmodel-cvc').numbermask({
            mask: "###"
        });
    }

    $(function () {
        $("#number-mask").on("pjax:end", function (e) {
            f();
            $('#error-temp').html('')
            if ($(e.target).find('.has-error').length !== 0) {
                $('.error-summary').show().appendTo('#error-temp');
                $('.screener-4').hide();
            } else {
                $('#number-mask').removeAttr('id')
                $('#form-mask').submit();
            }
        });
        f();
    })
</script>