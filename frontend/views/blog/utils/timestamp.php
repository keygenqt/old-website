<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

/* @var $timestamp Timestamp */

use common\models\Post;
use common\models\Timestamp;
use frontend\assets\FontAwesomeAssets;
use keygenqt\components\Html;
use yii\widgets\ActiveForm;

$this->title = 'Keygenqt | ' . $model->getTitle();

$timestamp = $params['timestamp'];

FontAwesomeAssets::register($this);

?>

<style>
    .blog-view .body {
        padding-bottom: 0;
    }

    .blog-view .title {
        margin-bottom: 20px;
    }

    .panel {
        padding: 10px;
    }

    .panel a {
        text-decoration: underline;
    }

    .panel.panel-info {
        border: 1px solid #ffffff;
        background: #c5c5c5;
        color: #ffffff;
    }

    .panel.panel-success {
        border: 1px solid #ffffff;
        background: #336333;
        color: #ffffff;
    }

    .panel.panel-map {
        border: 1px solid #ffffff;
        background: #092238;
        color: #ffffff;
    }

    .block-index .title {
        font-size: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>

<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>
<?= $form->field($timestamp, '_submit')->textInput()->hiddenInput()->label(false); ?>

<style>
    .screener-2 .block-index {
        background: #64000B;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
    }

    .screener-2 .block-index .panel.panel-info {
        font-size: 24px;
        color: black;
    }
</style>

<div <?= empty($timestamp->date) ? 'style="display: none;"' : '' ?> class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    Date:
                </div>
                <div class="panel panel-info">
                    <?= $timestamp->date ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-1 .block-index {
        background: #00020a;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
    }
</style>

<div class="page-row screener-1">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    Timestamp:
                </div>
                <div class="panel panel-info">
                    <?= $form->field($timestamp, 'timestamp')->textInput()->input('text', ['placeholder' => time()])->label(false); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-3 .block-index {
        background: #1e67a7;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
    }

    .timezone-map polygon {
        fill: #BBB;
    }

    .timezone-map polygon[data-selected="true"] {
        fill: #1e67a7;
    }

    .timezone-map polygon:hover {
        cursor: pointer;
        fill: #5A5A5A !important;
    }

    div.quick-link {
        position: absolute;
        bottom: 42px;
        right: 40px;
    }

    div.quick-link span {
        border: 1px solid #ffffff;
        background: #1e67a7;
        color: #ffffff;
        padding: 3px 5px;
        display: inline-block;
        margin-left: 10px;
        font-size: 12px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    div.quick-link span:hover {
        cursor: pointer;
    }

    .select-class {
        display: none;
    }

    .timezone-map {
        margin-top: 30px;
        margin-bottom: -35px;
    }

    @media (max-width: 800px) {
        .timezone-map {
            margin-bottom: 30px;
        }
    }

    @media (max-width: 470px) {
        div.quick-link span:nth-child(4),
        div.quick-link span:nth-child(2) {
            display: none;
        }
    }
</style>

<div class="page-row screener-3">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div id="map" class="panel panel-map"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-9 .block-index {
        background: #4F5364;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        text-align: right;
    }

    .screener-9 .block-index .btn {
        background: #10244e;
        border: 1px solid white;
    }
</style>

<div class="page-row screener-9">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="panel-forms">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<script src="https://cdn.jsdelivr.net/npm/timezone-picker@2.0.0-1/dist/timezone-picker.min.js"></script>

<script type="text/javascript">

    $('#map').timezonePicker({
        hoverTextClass: "select-class",
        defaultValue: "<?= empty($timestamp->timezone) ? 'Europe/London' : $timestamp->timezone ?>",
        quickLink: [{
            "LONDON": "Europe/London",
            "NEW YORK": "America/New_York",
            "MOSCOW": "Europe/Moscow",
            "KIEV": "Europe/Kiev",
        }]
    });

    $(function () {
        $('.country-lov').attr('name', 'Timestamp[timezone]')
    })

</script>
