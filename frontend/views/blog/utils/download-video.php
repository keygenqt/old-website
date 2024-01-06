<?php

/* @var $this yii\web\View */

/* @var $youTubeUrl YouTubeUrl */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use common\models\YouTubeUrl;
use frontend\assets\FontAwesomeAssets;
use keygenqt\components\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Keygenqt | ' . $model->getTitle();

$youTubeUrl = $params['youTubeUrl'];

$id = $youTubeUrl->getYouTubeId();

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
            background: #10244e;
            color: #ffffff;
        }

        .panel.panel-success {
            border: 1px solid #ffffff;
            background: #336333;
            color: #ffffff;
        }

        .panel.panel-error {
            border: 1px solid #ffffff;
            background: #653030;
            color: #ffffff;
        }

        .block-index .title {
            font-size: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>

    <style>
        .screener-1 .block-index {
            background: #4F5364;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
        }
    </style>

    <div <?= !empty($youTubeUrl->audio_id) ? 'style="display: none"' : '' ?> class="page-row screener-1">
        <div class="page-cell">
            <div class="page1">

                <div class="block-index">

                    <div class="panel panel-info">
                        Welcome! Download YouTube videos and audio with all available formats.
                        <?php if (Yii::$app->user->isGuest): ?>
                            <br>
                            <br>
                            Limit for guest user - 1 download in <?= ((int)((YouTubeUrl::LIMIT_SECOND) / 60)) ?> minutes. For unlimited downloads <a
                                    href="<?= Url::toRoute(['site/login']) ?>">login</a> in system.
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <style>
        .screener-3 .block-index {
            background: #310707;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
        }
    </style>

    <div <?= empty($id) && !empty($youTubeUrl->url) || $youTubeUrl->permission ? '' : 'style="display: none"' ?>
            class="page-row screener-3">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <div class="panel panel-error">
                        <?php if ($youTubeUrl->permission): ?>
                            For user guest has limit - <?= $youTubeUrl->permission ?> <?= $youTubeUrl->permission == 1 ? 'minute' : 'minutes' ?> left
                        <?php else: ?>
                            Error parse url.
                        <?php endif; ?>
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
    </style>

    <div <?= empty($youTubeUrl->audio_id) ? 'style="display: none"' : '' ?> class="page-row screener-4">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <div class="panel panel-success">
                        <?php if (empty($youTubeUrl->audio_id)): ?>
                            Parse url success. Select format and you can download video and sound.
                        <?php else: ?>
                            Successfully. Now you can download video and sound. You're welcome! :)
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .screener-2 {
            background: white;
        }

        .screener-2 .block-index {
            background: #3d7aff;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
        }

        .screener-2 .block-index .url-block {
            padding-bottom: 20px;
            border-bottom: 1px solid white;
            margin-bottom: 30px;
            padding-top: 0;
            position: relative;
        }

        .screener-2 .block-index .url-block .btn {
            position: absolute;
            right: 0;
            top: 0;
        }

        .screener-2 #yt-overview {
            width: 100%;
            height: 374px;
            background: #323232;
            text-align: center;
        }

        .screener-2 #yt-overview svg {
            font-size: 36px;
            color: white;
            margin-top: 164px;
        }

        @media (max-width: 1100px) {
            .screener-2 #yt-overview {
                height: 300px;
            }

            .screener-2 #yt-overview svg {
                margin-top: 134px;
            }
        }

        @media (max-width: 900px) {
            .screener-2 #yt-overview {
                height: 250px;
            }

            .screener-2 #yt-overview svg {
                margin-top: 103px;
            }
        }

        @media (max-width: 550px) {
            .screener-2 #yt-overview {
                height: 180px;
            }

            .screener-2 #yt-overview svg {
                margin-top: 69px;
            }
        }

        .screener-2 .block-index .panel-forms {
            padding-bottom: 20px;
            border-bottom: 1px solid white;
            margin-bottom: 30px;
            padding-top: 0;
            position: relative;
        }

        .screener-2 .block-index .panel-forms .btn {
            position: absolute;
            right: 0;
            top: 0;
        }

        .screener-2 .block-index select {
            width: calc(100% - 123px);
        }

        .screener-2 .block-index input {
            width: calc(100% - 90px);
        }
    </style>

    <div <?= !empty($youTubeUrl->audio_id) || $youTubeUrl->permission ? 'style="display: none"' : '' ?> class="page-row screener-2">
        <div class="page-cell">
            <div class="page1">

                <div class="block-index">

                    <div class="title">
                        Preview:
                    </div>

                    <?php if (empty($id)): ?>
                        <div class="url-block">
                            <?php $form = ActiveForm::begin([
                                'options' => [
                                    'autocomplete' => 'off'
                                ]
                            ]); ?>
                            <?= $form->field($youTubeUrl, 'url')->textInput()->input('url', ['placeholder' => "YouTube Url"])->label(false); ?>
                            <?= Html::submitButton('Parse', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($id)): ?>
                        <div id="yt-overview" class="yt">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>

<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>
<?= $form->field($youTubeUrl, 'url')->textInput()->hiddenInput()->label(false); ?>

    <style>
        .screener-5 .block-index {
            background: #551aa2;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
        }
    </style>

    <div style="display: none" class="page-row screener-5">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <div class="panel-forms">

                        <div class="title">
                            Audio:
                        </div>

                        <?= $form->field($youTubeUrl, 'audio_id')->dropDownList($youTubeUrl->audio)->label(false); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .screener-8 .block-index {
            background: #66023C;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
        }
    </style>

    <div style="display: none" class="page-row screener-8">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <div class="panel-forms">

                        <div class="title">
                            Video:
                        </div>

                        <?= $form->field($youTubeUrl, 'video_id')->dropDownList($youTubeUrl->video)->label(false); ?>
                    </div>
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

    <div style="display: none" class="page-row screener-9">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <div class="panel-forms">
                        <?= Html::submitButton('Start download', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .screener-10 .block-index {
            background: #FBB03B;
            padding: 8px 30px 0px;
            color: white;
            margin-bottom: 30px;
            text-align: center;
        }

        .screener-10 .block-index img {
            width: 90px;
        }
    </style>

    <div style="display: none" class="page-row screener-10">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <?= Html::img('../images/common/loading.gif') ?>
                </div>
            </div>
        </div>
    </div>

    <style>
        .screener-11 .block-index {
            background: #4F5364;
            padding: 30px 30px 20px;
            color: white;
            margin-bottom: 30px;
            text-align: right;
        }

        .screener-11 .block-index .btn {
            background: #10244e;
            border: 1px solid white;
            min-width: 180px;
            margin-bottom: 10px;
        }

        .screener-11 .block-index .panel-success {
            text-align: left;
            font-size: 18px;
            margin-bottom: 15px;
        }
    </style>

    <div <?= empty($youTubeUrl->audio_id) ? 'style="display: none"' : '' ?> class="page-row screener-11">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <?= Html::a('Download Audio', $youTubeUrl->audio_id, ['class' => 'btn btn-primary', 'download' => $youTubeUrl->getYouTubeId() . '-audio']) ?>
                    <br>
                    <?= Html::a('Download Video', $youTubeUrl->video_id, ['class' => 'btn btn-primary', 'download' => $youTubeUrl->getYouTubeId() . '-video']) ?>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>

    <script src="https://www.youtube.com/iframe_api"></script>

<?php if (!empty($id) && empty($youTubeUrl->audio_id)): ?>
    <script type="text/javascript">

        $('button[name="login-button"]').click(function () {
            $('.screener-10').show();
            $('.screener-1').hide();
            $('.screener-4').hide();
            $('.screener-5').hide();
            $('.screener-6').hide();
            $('.screener-7').hide();
            $('.screener-8').hide();
            $('.screener-9').hide();
        })

        const idsYouTubes = [];

        function addIdYouTubes(id) {
            idsYouTubes[idsYouTubes.length] = id;
        }

        function showYouTube() {
            window.onYouTubePlayerAPIReady = function () {
                setTimeout(function () {
                    idsYouTubes.forEach(function (item) {
                        initYouTube(item);
                    });
                }, 500);
            };
        }

        function initYouTube(id) {
            const player = new YT.Player('yt-overview', {
                playerVars: {rel: 0},
                videoId: id,
                events: {
                    'onReady': function () {
                        $('.screener-4').show();
                        $('.screener-5').show();
                        $('.screener-6').show();
                        $('.screener-7').show();
                        $('.screener-8').show();
                        $('.screener-9').show();

                        $('.bg-yt').click(function () {
                            $(this).css('z-index', '0');
                            player.playVideo();
                        })
                    },
                    'onStateChange': function (event) {
                        if (event.data === 0) {
                            $('.bg-yt').css('z-index', '10');
                        }
                    }
                }
            });
        }

        addIdYouTubes("<?= $id ?>");
        showYouTube();

    </script>
<?php endif; ?>