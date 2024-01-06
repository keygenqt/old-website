<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\RainbowAsset;
use keygenqt\components\Html;
use keygenqt\sceditor\SCEditor;
use yii\widgets\ActiveForm;

$this->title = 'Keygenqt | ' . $model->getTitle();

FontAwesomeAssets::register($this);
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
                    SCEditor
                </div>
                <div class="panel panel-info">

                    <p>
                        Extension yii for library <a href="https://www.sceditor.com/" target="_blank">SCEditor</a>
                        <br>
                        <br>
                    </p>

                    <div style="font-size: 24px;" class="title">
                        Installation
                    </div>

                    <div>
                        The preferred way to install this extension is through <a target="_blank"
                                                                                  href="http://getcomposer.org/download/">composer</a>.
                        <br>
                        <br>
                        Either add
                        <br>
                        <br>
                    </div>

                    <pre>
    <code data-language="php">"require": {
    "keygenqt/keygenqt/yii2-sceditor": "*"
}</code>
</pre>

                    <div>
                        of your <a target="_blank" href="https://getcomposer.org/doc/">composer.json</a> file.
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-success .block-index {
        background: #0b2906;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
    }

    .screener-success .panel.panel-success {
        border: 1px solid #ffffff;
        background: #336333;
        color: #ffffff;
        padding: 10px;
    }
</style>

<?php if (Yii::$app->session->getFlash('success') != null): ?>
    <div class="page-row screener-success">
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
</style>

<div class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">

                <div class="title">
                    Example form
                </div>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'editor')->widget(SCEditor::class, [
                    'jsOption' => [
                        'height' => 300,
                        'resizeWidth' => false,
                        'style' => 'minified/jquery.sceditor.default.min.css',
                    ]
                ]) ?>

                <?= $form->field($model, 'integer')->textInput()->input('text', ['placeholder' => 'Integer']) ?>

                <?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => 'Email']) ?>

                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>

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
                    Example form code
                </div>
                <div class="panel panel-info">

<pre>
    <code data-language="php">&#60;?php $form = ActiveForm::begin(); ?>

&#60;?= $form->errorSummary($model); ?>

&#60;?= $form->field($model, 'editor')->widget(SCEditor::class, [
    'jsOption' => [
        'height' => 300,
        'resizeWidth' => false,
        'style' => 'minified/jquery.sceditor.default.min.css',
    ]
]) ?>

&#60;?= $form->field($model, 'integer')->textInput()->input('text', ['placeholder' => 'Integer']) ?>

&#60;?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => 'Email']) ?>

&#60;?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

&#60;?php ActiveForm::end(); ?></code>
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
        margin-bottom: 30px;
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
                    License Extension
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

<style>
    .screener-4 .block-index {
        background: #3e3e3e;
        padding: 30px;
        color: #ffffff;
        border: 1px solid #727684;
        position: relative;
    }

    .screener-4 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }

    .screener-4 .block-index a {
        text-decoration: underline;
    }
</style>

<div class="page-row screener-4">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    License SCEditor
                </div>
                <div class="panel panel-info">
                    <a target="_blank" href="https://www.sceditor.com/documentation/support-licensing/">MIT license</a>
                </div>
            </div>
        </div>
    </div>
</div>