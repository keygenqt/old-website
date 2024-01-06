<?php

/* @var $this yii\web\View */

$this->title = 'Keygenqt | Home';

use frontend\assets\FontAwesomeAssets;
use frontend\assets\GlideAsset;
use keygenqt\components\Html;

FontAwesomeAssets::register($this);
GlideAsset::register($this);

?>

<style>
    @media (max-width: 1240px) {
        .body .body-cell.content .content-data .index-2 div.page,
        .body .body-cell.content .content-data .index-3 div.page {
            padding-bottom: 0;
        }
    }

</style>

<div class="index-1 row">
    <div class="cell">
        <div class="page">

            <ul>
                <li>
                    <div class="circle">
                        <?= Html::img('images/index/icons/experiment-results.png') ?>
                    </div>

                    <div class="title">
                        Experience
                    </div>
                </li>

                <li>
                    <div class="circle">
                        <?= Html::img('images/index/icons/like.png') ?>
                    </div>

                    <div class="title">
                        I like my job
                    </div>
                </li>

                <li>
                    <div class="circle">
                        <?= Html::img('images/index/icons/briefcase.png') ?>
                    </div>

                    <div class="title">
                        Large portfolio
                    </div>
                </li>

                <li>
                    <div class="circle">
                        <?= Html::img('images/index/icons/chat.png') ?>
                    </div>

                    <div class="title">
                        Cross Platform
                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>

<div class="index index-2 row">
    <div class="cell">
        <div class="page">

            <div class="items-images">
                <div class="item-1">
                    Development
                    <div></div>
                    android
                    <div></div>
                    application
                </div>
                <div class="item-2">
                    <?= Html::img('images/index/nexus.png') ?>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="index-quote row">
    <div class="cell" style="background-image: url(<?= Html::imgUrl('images/index/quote-bg/bg-1.jpg') ?>);">
        <div class="page">

            <?= Html::img('images/index/quote.png') ?>

            <div>
                There are two ways of constructing a software design: One way is to make it so simple that there are
                obviously no deficiencies, and the other way is to make it so complicated that there are no obvious
                deficiencies. The first method is far more difficult.
            </div>

            <strong>— C. A. R. Hoare</strong>

        </div>
    </div>
</div>

<div class="index index-3 row">
    <div class="cell">
        <div class="page">

            <div class="items-images left">
                <div class="item-2">
                    <?= Html::img('images/index/web.jpg') ?>
                </div>
                <div class="item-1">
                    Development web
                    <div></div>
                    full stack
                </div>
            </div>

        </div>
    </div>
</div>

<div class="index-quote row">
    <div class="cell" style="background-image: url(<?= Html::imgUrl('images/index/quote-bg/bg-2.jpg') ?>);">
        <div class="page">

            <?= Html::img('images/index/quote.png') ?>

            <div>
                Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where
                you live.
            </div>

            <strong>— Martin Golding</strong>

        </div>
    </div>
</div>

<div class="index-4 row">
    <div class="cell">
        <div class="page">

            <div class="title">
                Favorite Technologies
            </div>

            <div class="footer-company">

                <div class="glide" id="light-slider">
                    <div class="glide__wrapper">
                        <div class="glide__track">

                            <div class="glide__slide">
                                <div class="box">
                                    <div class="item">
                                        <a target="_blank" href="http://www.yiiframework.com/">
                                            <?= Html::img("images/index/slider/1.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://www.w3.org/">
                                            <?= Html::img("images/index/slider/2.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://secure.php.net/">
                                            <?= Html::img("images/index/slider/3.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="#">
                                            <?= Html::img("images/index/slider/4.png") ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="glide__slide">
                                <div class="box">
                                    <div class="item">
                                        <a target="_blank" href="https://developer.android.com/studio/index.html">
                                            <?= Html::img("images/index/slider/12.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://www.elastic.co/">
                                            <?= Html::img("images/index/slider/6.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://www.qt.io/">
                                            <?= Html::img("images/index/slider/8.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://www.vertica.com/">
                                            <?= Html::img("images/index/slider/7.png") ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="glide__slide">
                                <div class="box">
                                    <div class="item">
                                        <a target="_blank" href="https://jquery.com/">
                                            <?= Html::img("images/index/slider/9.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://developer.mozilla.org/fr/docs/Web/JavaScript">
                                            <?= Html::img("images/index/slider/10.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://www.kernel.org/">
                                            <?= Html::img("images/index/slider/11.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://java.com">
                                            <?= Html::img("images/index/slider/5.png") ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="glide__slide">
                                <div class="box">
                                    <div class="item">
                                        <a target="_blank" href="https://www.mercurial-scm.org/">
                                            <?= Html::img("images/index/slider/14.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://git-scm.com/">
                                            <?= Html::img("images/index/slider/13.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://httpd.apache.org/">
                                            <?= Html::img("images/index/slider/16.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://www.docker.com/">
                                            <?= Html::img("images/index/slider/17.png") ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="glide__slide">
                                <div class="box">
                                    <div class="item">
                                        <a target="_blank" href="https://gtk.org/">
                                            <?= Html::img("images/index/slider/GTK.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://gradle.org/">
                                            <?= Html::img("images/index/slider/gradle.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://kotlinlang.org/">
                                            <?= Html::img("images/index/slider/kotlin.png") ?>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a target="_blank" href="https://snapcraft.io/">
                                            <?= Html::img("images/index/slider/snapcraft.png") ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="glide__bullets"></div>

                </div>
            </div>

            <script>
                $("#light-slider").glide();
            </script>

        </div>
    </div>
</div>

<div class="index-quote row">
    <div class="cell" style="background-image: url(<?= Html::imgUrl('images/index/quote-bg/bg-3.jpg') ?>);">
        <div class="page">

            <?= Html::img('images/index/quote.png') ?>

            <div>
                Talk is cheap. Show me the code.
            </div>

            <strong>— Linus Torvalds</strong>

        </div>
    </div>
</div>

