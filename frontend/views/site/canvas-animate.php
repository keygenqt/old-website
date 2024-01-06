<?php

/* @var $this yii\web\View */

$this->title = 'Keygenqt | Canvas Animate';

use keygenqt\components\Html;

\frontend\assets\JsAsset::register($this);

?>

<style>
    /* canvas-animate-1 */
    .canvas-animate-1 .cell {
        padding: 30px 0;
        vertical-align: top;
    }
    .canvas-animate-1 .block .title {
        font-size: 24px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid black;
    }
    .canvas-animate-1 .block .title div {
        font-size: 16px;
        color: grey;
        font-style: italic;
    }
    .canvas-animate-1 .block {
        width: 100%;
        font-size: 0;
    }
    .canvas-animate-1 .block video,
    .canvas-animate-1 .block .canvas-animate {
        display: block;
        width: 100%;
        height: 400px;
        background: gray;
        margin: 0 auto;
        margin-bottom: 30px;
    }
    /* canvas-animate-1 */
</style>

<div class="canvas-animate-1 row">
    <div class="cell">
        <div class="page">

            <div class="block">

                <div class="title">
                    Canvas
                    <div>
                        (+ffmpeg output - 2 folder output 1280 × 720 (desktop) and 500 × 281 (mobile) ~250M, video: 1280 × 720 ~50M)
                    </div>
                </div>

                <div id="canvas-animate-1" class="canvas-animate"></div>
                <div id="canvas-animate-2" class="canvas-animate"></div>
            </div>

        </div>
    </div>
</div>

<script>
    var canvasAnimate1 = new CanvasAnimate('#canvas-animate-1', {
        mode: 'cover', // cover, center
        start: 39,
        fps: 24,
        pad: 4,
        desktopPath: '/video/1-full',
        mobilePath: '/video/1-mob'
    });

    $('#canvas-animate-1').click(function () {
        if (canvasAnimate1.isPause()) {
            canvasAnimate1.start();
        } else {
            canvasAnimate1.pause();
        }
    });

    var canvasAnimate2 = new CanvasAnimate('#canvas-animate-2', {
        mode: 'cover', // cover, center
        start: 39,
        fps: 24,
        pad: 4,
        desktopPath: '/video/2-full',
        mobilePath: '/video/2-mob'
    });

    $('#canvas-animate-2').click(function () {
        if (canvasAnimate2.isPause()) {
            canvasAnimate2.start();
        } else {
            canvasAnimate2.pause();
        }
    });
</script>