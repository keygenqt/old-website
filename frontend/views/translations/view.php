<?php

/* @var $this yii\web\View */
/* @var $model TranslationData */

$this->title = 'Keygenqt | ' . $model->title;

use common\models\Sentence;
use common\models\Translation;
use common\models\TranslationData;
use frontend\assets\FontAwesomeAssets;
use keygenqt\components\Html;

$notFoundAudio = 0;
$style = empty(Yii::$app->request->get()['style']) ? 1 : Yii::$app->request->get()['style'];
$ruStatus = true;
$ruCount = 0;
$translation = Translation::findOne(['id' => $model->translation_id]);

FontAwesomeAssets::register($this);

?>

<style>
    .body .body-cell.content .content-data .cell {
        vertical-align: top;
    }

    .blog-view .title strong {
        font-size: 16px;
        display: block;
        margin-top: 8px;
        font-style: italic;
        font-weight: normal;
    }

    .blog-view .full-audio {
        padding-bottom: 15px;
    }

    .blog-view .full-audio audio {
        margin-bottom: 10px;
    }

    .blog-view .full-audio .audio-author {
        text-align: right;
        font-size: 14px;
        font-style: italic;
    }

    .blog-view .full-audio .audio-author a {
        display: inline-block;
        margin-right: 10px;
    }

    .blog-view .full-audio .audio-author svg:hover {
        color: #2cb6e9;
        cursor: pointer;
    }

    .blog-view #yt-overview {
        width: 100%;
        margin-top: 20px;
    }

    <?php if ($style == 3): ?>
    .blog-view .body {
        padding: 0;
        border: none;
    }

    <?php endif; ?>
</style>

<div class="blog-view row">
    <div class="cell">
        <div class="page">

            <div class="title">
                <?= $model->title ?>
                <strong>
                    <?php if ($model->title != $translation->title): ?>
                        <?= $translation->title ?>,
                    <?php endif; ?>
                    <?= $translation->author ?>
                </strong>
            </div>

            <div class="body">


                <div class="body-book-style-input">
                    <?php $form = \yii\widgets\ActiveForm::begin(['method' => 'get']); ?>
                    <?= Html::dropDownList('category', $style, \yii\helpers\ArrayHelper::merge([
                        1 => 'English',
                        2 => 'Russian',
                        3 => 'English + Russian',
                    ], empty($model->audio_index) ? [] : [
                        4 => 'English audio',
                    ]),
                        ['onchange' => 'window.location.href = "' . \yii\helpers\Url::to(['translations/view', 'key' => $model->url]) . '/" + $(this).val()']) ?>
                    <?php \yii\widgets\ActiveForm::end(); ?>
                </div>

                <?php if (!empty($model->audio_full_name) && $style == 1 && is_file(__DIR__ . '/../../web' . "/books/{$model->url}/$model->audio_full_name")): ?>

                    <div class="full-audio">
                        <audio class="full-audio-item" style="width: 100%" controls>
                            <source src="<?= "/books/{$model->url}/$model->audio_full_name" ?>" type="audio/mpeg">
                        </audio>
                        <div class="audio-author">
                            <?php if (empty($model->video_author_url)): ?>
                                Read by <?= $model->audio_author_name ?>
                            <?php else: ?>
                                <?= Html::a("Read by  $model->audio_author_name", $model->video_author_url, ['target' => '_blank']) ?> <i class="fas fa-eye"></i>
                            <?php endif; ?>
                        </div>

                        <div id="yt-overview" class="yt" style="display: none">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                    </div>

                <?php endif; ?>

                <table class="body-book body-book-style-<?= $style ?>">
                    <?php foreach (Sentence::find()->where(['translations_data_id' => $model->id])->orderBy('order')->all() as $item): ?>

                        <?php
                        if ($model->audio_index !== null && $model->audio_index !== '' && $style == 4) {
                            $i = sprintf("%04d", $model->audio_index);
                            $file = "/books/{$model->url}/$i.mp3";
                            $model->audio_index++;
                        }
                        ?>

                        <?php if (empty($item->ru)): ?>
                            <?php $ruStatus = false;
                            $ruCount++ ?>
                        <?php endif; ?>

                        <?php if (empty($item->eng)): ?>
                            <?php continue; ?>
                        <?php endif; ?>

                        <?php if ($model->audio_index !== null && $model->audio_index !== '' && $style == 4 && !is_file(__DIR__ . '/../../web' . $file)): ?>
                            <?php $notFoundAudio++;
                            continue; ?>
                        <?php endif; ?>

                        <tr class="<?= $style == 2 && !empty($item->ru) && $item->paragraph || $style == 1 && !empty($item->eng) && $item->paragraph ? 'paragraph' : ''; ?>">
                            <td id="<?= $model->audio_index ?>-eng">
                                <?= $item->eng ?>
                            </td>
                            <td id="<?= $model->audio_index ?>-ru">
                                <?= $item->ru ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php if (!empty($file)): ?>
                                    <audio style="width: 100%" controls>
                                        <source src="<?= $file ?>" type="audio/mpeg">
                                    </audio>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="date">
                <?php if (!empty($notFoundAudio)): ?>
                    <div>
                        Not found audio: <b><?= $notFoundAudio ?></b>
                    </div>
                <?php endif; ?>
                <?php if (!empty($ruCount)): ?>
                    <div>
                        Translated:
                        <b><?= 100 - round(($ruCount * 100 / Sentence::find()->where(['translations_data_id' => $model->id])->count())) . '%' ?></b>
                    </div>
                <?php endif; ?>
                <?= date("F j, Y", $model->updated_at) ?>
            </div>

        </div>
    </div>
</div>

<?php if ($ruStatus): ?>
    <script>
        $(function () {
            $('.body-book-style-input').show()
        })
    </script>
<?php endif; ?>

<?php if (!empty($model->video_author_url)): ?>

    <script src="https://www.youtube.com/iframe_api"></script>

    <script type="text/javascript">

        $(function () {
            $('.fa-eye').click(function () {
                const yt = $('#yt-overview');
                const fa = $('.full-audio-item');
                if (yt.css('display') === 'none') {
                    yt.show()
                    fa.hide()
                } else {
                    yt.hide()
                    fa.show()
                }
            })
        });

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

        addIdYouTubes("<?= $model->getYouTubeId() ?>");
        showYouTube();

    </script>
<?php endif; ?>