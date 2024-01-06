<?php

/* @var $this yii\web\View */

use frontend\assets\FontAwesomeAssets;

$this->title = 'Screener';

FontAwesomeAssets::register($this);

?>

<style>
    .screener-5 .title,
    .screener-2 .subtitle,
    .screener-3 .subtitle,
    .screener-4 .subtitle,
    .screener-5 .subtitle {
        padding-top: 30px;
    }

    .screener-3 .subtitle,
    .screener-4 .subtitle {
        padding: 30px;
    }

    .buttons {
        padding-top: 30px;
    }

    .btn {
        display: inline-block;
        font-size: 16px;
        color: white;
        background: #4285f4;
        font-weight: bold;
        padding: 14px 20px;
        margin: 0;;
    }

    .screener-1 {
        background: white;
    }

    .screener-1 .title {
        font-size: 60px;
        font-weight: bold;
        margin-bottom: 70px;
    }

    .screener-1 .subtitle {
        font-size: 20px;
        font-weight: normal;
        margin-bottom: 50px;
        margin-top: 30px;
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
        .screener-1 .title {
            font-size: 30px;
            margin-bottom: 30px;
        }

        .screener-1 .subtitle {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .screener-2 #yt-overview {
            height: 180px;
        }

        .screener-2 #yt-overview svg {
            margin-top: 69px;
        }
    }
</style>

<div class="page-row screener-1">
    <div class="page-cell">
        <div class="page1">
            <div class="subtitle">
                Linux app for easy screenshot.
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
    }

    .screener-2 .block-index .title {
        font-size: 30px;
        font-weight: bold;
        padding-bottom: 20px;
        border-bottom: 1px solid white;
        margin-bottom: 30px;
        padding-top: 0;
    }
</style>

<div class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">

            <div class="block-index">

                <div class="title">
                    Demo
                </div>

                <div id="yt-overview" class="yt">
                    <i class="fas fa-hourglass-half"></i>
                </div>

            </div>

        </div>
    </div>
</div>

<style>
    .screener-3 {
        background: white;
        margin-top: 30px;
    }

    .screener-3 .block-index {
        background: #ec4c4c;
        padding: 30px;
        color: white;
    }

    .screener-3 .block-index .title {
        font-size: 30px;
        font-weight: bold;
        padding-bottom: 20px;
        border-bottom: 1px solid white;
        margin-bottom: 30px;
    }

    .screener-3 .block-index .subtitle {
        padding: 0;
    }

    .black .screener-3 .block-index .subtitle {
        padding: 10px;
    }
</style>

<div class="page-row screener-3">
    <div class="page-cell">
        <div class="page1">

            <div class="block-index">

                <div class="title">
                    Google Cloud Vision API
                </div>

                <div class="subtitle">
                    Google Cloud Vision API enables developers to understand the content of an image by encapsulating
                    powerful machine learning models in an easy to use REST API. It quickly classifies images into
                    thousands of categories (e.g., "sailboat", "lion", "Eiffel Tower"), detects individual objects and
                    faces within images, and finds and reads printed words contained within images. You can build
                    metadata on your image catalog, moderate offensive content, or enable new marketing scenarios
                    through image sentiment analysis. Analyze images uploaded in the request or integrate with your
                    image storage on Google Cloud Storage.
                </div>

                <div class="buttons">
                    <a target="_blank" class="btn" href="https://cloud.google.com/docs/">
                        VIEW DOCUMENTATION
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

<style>
    .screener-4 {
        background: white;
        margin-top: 30px;
    }

    .screener-4 .block-index {
        background: #6247d0;
        padding: 30px;
        color: white;
        margin-bottom: 70px;
    }

    .screener-4 .block-index .title {
        font-size: 30px;
        font-weight: bold;
        padding-bottom: 20px;
        border-bottom: 1px solid white;
        margin-bottom: 30px;
    }

    .screener-4 .block-index .subtitle {
        padding: 0;
    }

    .black .screener-4 .block-index .subtitle {
        padding: 10px;
    }
</style>

<div class="page-row screener-4">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">

                <div class="title">
                    Cloud Translation API
                </div>

                <div class="subtitle">
                    Translation API provides a simple programmatic interface for translating an arbitrary string into
                    any supported language using state-of-the-art Neural Machine Translation. Translation API is highly
                    responsive, so websites and applications can integrate with Translation API for fast, dynamic
                    translation of source text from the source language to a target language (e.g., French to English).
                    Language detection is also available in cases where the source language is unknown. The underlying
                    technology pushes the boundary of Machine Translation and is updated constantly to seamlessly
                    improve translations and introduce new languages and language pairs.
                </div>

                <div class="buttons">
                    <a target="_blank" class="btn" href="https://cloud.google.com/translate/docs/">
                        VIEW DOCUMENTATION
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .screener-5 {
        background: white;
    }

    .screener-5 .title {
        font-size: 40px;
        font-weight: bold;
        padding-top: 0;
        margin-bottom: 0;
    }

    .screener-5 .title span {
        font-size: 19px;
        color: #aba7a7;
        display: block;
        padding-top: 11px;
    }

    .screener-5 .subtitle {
        font-size: 16px;
        font-weight: normal;
    }

    .screener-5 .code {
        font-size: 14px;
        font-weight: normal;
        color: white;
        background: #333;
        margin-top: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
        list-style: none;
        padding-left: 30px;
    }

    .screener-5 .code li div {
        display: inline-block;
    }

    .screener-5 .code li::before {
        content: "$";
        color: white;
        position: relative;
        left: -7px;
    }

    .screener-5 .code-params {
        font-size: 14px;
        font-weight: normal;
        color: white;
        background: #333;
        margin-top: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
        list-style: none;
        padding-left: 25px;
        margin-bottom: 70px;
    }

    .screener-5 .code-params li::before {
        content: "";
        color: white;
        position: relative;
        left: -7px;
    }

    .screener-5 .code-params li span {
        display: block;
        padding-top: 2px;
        padding-bottom: 15px;
        padding-left: 20px;
    }

    .screener-5 .code-params li:last-child span {
        padding-bottom: 0;
    }

    @media (max-width: 600px) {
        .screener-5 .code {
            overflow: auto;
            width: 100%;
        }

        .screener-5 .code li {
            white-space: nowrap;
        }
    }

    @media (max-width: 520px) {
        .screener-5 .code-params li,
        .screener-5 .code li {
            font-size: 9px;
        }

        .page-row.screener-5 {
            display: none;
        }

        .screener-4 .block-index {
            margin-bottom: 30px;
        }
    }
</style>

<div class="page-row screener-5" style="margin-top: 30px;">
    <div class="page-cell">
        <div class="page1">

            <div class="title">
                Try me
            </div>

            <div class="subtitle">
                <a href="https://snapcraft.io/screener">
                    <img alt="Get it from the Snap Store" src="https://snapcraft.io/static/images/badges/en/snap-store-white.svg" />
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://www.youtube.com/iframe_api"></script>

<script type="text/javascript">
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

    addIdYouTubes("jZiWG-dcvew");
    showYouTube();

</script>
