<?php

/** @var $content string */

use backend\assets\FontAwesomeAsset;
use backend\assets\LayoutAsset;
use keygenqt\breadcrumbsPanel\BreadcrumbsPanel;
use keygenqt\components\Html;
use keygenqt\verticalMenu\VerticalMenu;

LayoutAsset::register($this);
FontAwesomeAsset::register($this);

$is_work = Yii::$app->request->get('work');

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= Html::imgUrl('images/favicon.png') ?>" sizes="16x16">
    <title><?= $this->title ?></title>

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div class="body-content">
    <?php if (!Yii::$app->user->isGuest): ?>
        <?= VerticalMenu::widget([
            'title' => 'KeyGenQt',
            'subtitle' => 'Admin panel',
            'titleUrl' => '/',
            'itemsFront' => [
                [
                    'url' => ['site/logout'],
                    'icon' => 'fas fa-sign-out-alt',
                    'color' => '#2cb6e9',
                    'options' => [
                        'style' => '
                                        padding-top: 18px;
                                        -webkit-transform: rotate(-180deg); 
                                        -moz-transform: rotate(-180deg);
                                        -ms-transform: rotate(-180deg);
                                        -o-transform: rotate(-180deg);'
                    ],
                ],
            ],
            'items' => [
                [
                    'label' => 'Dashboard',
                    'url' => ['site/index'],
                ],
                [
                    'label' => '<i class="fas fa-caret-down"></i> Blog',
                    'items' => [
                        [
                            'label' => 'Category',
                            'url' => ['category-blog/index'],
                        ],
                        [
                            'label' => 'Blog',
                            'url' => ['post/index'],
                            'active' => empty($is_work) && Yii::$app->controller->id == 'post'
                        ],
                        [
                            'label' => 'Work',
                            'url' => ['post/index', 'work' => 1],
                            'active' => !empty($is_work) && Yii::$app->controller->id == 'post'
                        ],
                    ]
                ],
                [
                    'label' => '<i class="fas fa-caret-down"></i> Translations',
                    'items' => [
                        [
                            'label' => 'Translations',
                            'url' => ['translation/index'],
                        ],
                        [
                            'label' => 'Data',
                            'url' => ['translation-data/index'],
                        ],
                    ]
                ],
                [
                    'label' => 'Users',
                    'url' => ['users/index'],
                ],
            ]
        ]);
        ?>
    <?php endif; ?>

    <?= BreadcrumbsPanel::widget([
        'content' => $content
    ]) ?>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
