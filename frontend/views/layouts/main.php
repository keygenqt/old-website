<?php

use common\models\Post;
use common\models\Statistics;
use common\models\Translation;
use common\models\TranslationData;
use frontend\assets\AppAsset;
use keygenqt\components\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $content string */
/* @var $categories */

AppAsset::register($this);

$idPage = Yii::$app->controller->id . '-' . Yii::$app->controller->action->id;

if (empty(Yii::$app->controller->model)) {
    Statistics::addStatistic($idPage);
} else {
    Statistics::addStatistic($idPage, Yii::$app->controller->model->id);
}

$utils = [42, 43, 44, 45, 46, 47];

$theme = '';

if (Yii::$app->session->get('theme') == 1) {
    $theme = 'black';
}

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link href="<?= Html::imgUrl('images/common/favicon.png') ?>" rel="shortcut icon" type="image/x-icon"/>

        <?php if ($idPage == 'blog-view'): ?>
            <?php /* @var Post $model */
            $model = Yii::$app->controller->model; ?>
            <meta property="og:title" content="<?= $model->getTitle() ?>">
            <meta property="og:description" content="<?= $model->description ?>">
            <meta property="og:image"
                  content="<?= str_replace("//images", "/images", Url::home(true) . $model->image) ?>">
        <?php endif; ?>

        <?php if ($idPage == 'translations-view'): ?>
            <?php /* @var TranslationData $model */
            $model = Yii::$app->controller->model; ?>
            <meta property="og:title" content="<?= $model->title ?>">
            <meta property="og:description"
                  content="<?= Translation::findOne(['id' => $model->translation_id])->author ?>">
            <meta property="og:image"
                  content="<?= str_replace("//images", "/images", Url::home(true) .
                      Translation::findOne(['id' => $model->translation_id])->image) ?>">
        <?php endif; ?>

        <?php if (!YII_ENV_DEV): ?>
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-66553833-1', 'auto');
                ga('send', 'pageview');

            </script>
        <?php endif; ?>

        <?php $this->head() ?>
    </head>

    <body class="<?= $theme ?>">
    <?php $this->beginBody() ?>
    <div class="body <?= $idPage ?>">

        <?php if (Yii::$app->controller->action->id == 'index'): ?>
            <div class="body-row header-index-row">
                <div id="header-index" class="body-cell header-index">

                    <div class="page">

                        <div>
                            WELCOME!
                        </div>

                        <ul class="menu">
                            <li>
                                <a href="javascript:;"
                                   onclick="$('html, body').animate({ scrollTop: $('.header .menu').offset().top - 15  }, 500);">
                                    <?= Html::img('images/index/menu-2.png') ?>
                                    <span>
                                    ABOUT
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:dev@keygenqt.com">
                                    <?= Html::img('images/index/menu-4.png') ?>
                                    <span>
                                    CONTACT
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= \yii\helpers\Url::toRoute(['blog/index']) ?>">
                                    <?= Html::img('images/index/menu-3.png') ?>
                                    <span>
                                    BLOG
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= \yii\helpers\Url::toRoute(['work/index']) ?>">
                                    <?= Html::img('images/index/menu-8.png') ?>
                                    <span>
                                    WORK
                                </span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://github.com/keygenqt">
                                    <?= Html::img('images/index/menu-1.png') ?>
                                    <span>
                                    GITHUB
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= Url::toRoute(['site/mysql']) ?>">
                                    <?= Html::img('images/index/menu-5.png') ?>
                                    <span>
                                    MYSQL
                                </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::toRoute(['site/artifactory']) ?>">
                                    <?= Html::img('images/index/menu-6.png') ?>
                                    <span>
                                    ARTIFACTORY
                                </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= Url::toRoute(['site/gitlab']) ?>">
                                    <?= Html::img('images/index/menu-7.png') ?>
                                    <span>
                                    GIT
                                </span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>

            <script>
                $(function () {
                    $('#header-index').height($(window).height());

                    $(window).resize(function () {
                        var $menu = $('.header-index .menu');
                        $menu.css('max-width', 'none');
                        var $lH = $menu.find('li:eq(0)').outerWidth(true),
                            $w = parseInt($menu.innerWidth() / $lH) * $lH;
                        $menu.css('max-width', $w);
                    }).resize();
                });
            </script>
        <?php endif; ?>

        <div class="body-row">
            <div class="body-cell header bg-image-<?= $idPage == 'blog-view' && Yii::$app->controller->model->is_work ? 'work' : Yii::$app->controller->id ?>">

                <div class="bg-image"></div>

                <div class="page menu">
                    <?= \yii\widgets\Menu::widget([
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'label' => 'Home',
                                'url' => ['site/index']
                            ],
                            [
                                'label' => 'Blog',
                                'url' => ['blog/index'],
                                'active' => Yii::$app->controller->id == 'blog' && (empty(Yii::$app->controller->model) || Yii::$app->controller->model->is_work != 1)
                            ],
                            [
                                'label' => 'Work',
                                'url' => ['work/index'],
                                'active' => Yii::$app->controller->id == 'work'
                                    && (empty(Yii::$app->controller->actionParams['category']) || Yii::$app->controller->actionParams['category'] != 14)
                                    || (!empty(Yii::$app->controller->model) && !empty(Yii::$app->controller->model->is_work)
                                        && !in_array(Yii::$app->controller->model->id, $utils))
                            ],
                            [
                                'label' => 'Utils',
                                'url' => ['work/index', 'page' => 1, 'category' => 14],
                                'active' => Yii::$app->controller->id == 'work'
                                    && (!empty(Yii::$app->controller->actionParams['category']) && Yii::$app->controller->actionParams['category'] == 14)
                                    || (!empty(Yii::$app->controller->model) && !empty(Yii::$app->controller->model->is_work)
                                        && in_array(Yii::$app->controller->model->id, $utils))
                            ],
                            [
                                'label' => 'Translate',
                                'url' => ['translations/index'],
                            ],
                            [
                                'label' => 'Panel',
                                'url' => ['/admin/site/index'],
                                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->getIdentity()->is_admin
                            ],
                            [
                                'label' => 'Login',
                                'url' => ['site/login'],
                                'visible' => Yii::$app->user->isGuest
                            ],
                            [
                                'label' => 'Logout',
                                'url' => ['site/logout'],
                                'visible' => !Yii::$app->user->isGuest
                            ],
                        ]
                    ]); ?>
                </div>
            </div>
        </div>

        <div class="body-row">
            <div class="body-cell content">
                <div class="content-data">
                    <?= $content ?>
                </div>
            </div>
        </div>

        <div class="body-row">
            <div class="body-cell footer">

                <div class="page">

                    <div class="block">

                        <div class="text">
                            <?= date('Y') ?>
                        </div>

                        <div class="soc">
                            <ul>
                                <li>
                                    <a target="_blank" href="https://plus.google.com/115856244890974724607">
                                        <?= Html::img("images/common/soc/google-plus.png") ?>
                                        <?= Html::img("images/common/soc/google-plus-active.png", ['class' => 'active']) ?>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="https://twitter.com/keygenqt">
                                        <?= Html::img("images/common/soc/twitter.png") ?>
                                        <?= Html::img("images/common/soc/twitter-active.png", ['class' => 'active']) ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="button-up">
                    <?= Html::img("images/common/arrow_up.png") ?>
                </div>
                <div class="button-theme">
                    <?= Html::img("images/common/photo.png") ?>
                </div>

            </div>
        </div>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>