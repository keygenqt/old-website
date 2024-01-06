<?php

/* @var $model Post */

use common\models\Post;
use keygenqt\components\Html;
use yii\helpers\Url;

?>

<style>
    ul.work-items li.work-item a.disable-url {
        cursor: inherit;
    }

    ul.work-items li.work-item .url-block {
        padding: 20px 20px;
        border-top: 1px solid #e9eaec;
    }

    ul.work-items li.work-item .url-block a img {
        position: inherit;
    }

    .code-block {
        position: absolute;
        top: 10px;
        padding: 4px 10px 4px 8px;
        left: 0;
        z-index: 999;
        background: #337298;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        color: white;
        font-size: 14px;
        font-weight: bold;
        min-width: 60px;
        text-align: center;
    }
</style>

<?php if ($model->is_work): ?>

    <?php if (!empty($model->code)): ?>
        <div style="background: <?php echo Post::$CODES[$model->code] ?>; color: <?= $model->code == 'JS' ? 'black' : 'white' ?>" class="code-block">
            <?= $model->code ?>
        </div>
    <?php endif; ?>

    <?php if ($model->is_soon): ?>
        <a class='disable-url' href="javascript:void(0)">
            <?= Html::img('../images/common/coming.png') ?>
            <div class="image"
                 style="background-image: url('<?= $model->image ?>')"></div>
            <div class="title">
                <?= $model->getTitle() ?>
            </div>
            <div class="desc">
                <?= $model->description ?>
            </div>
        </a>
    <?php else: ?>
        <?php
        switch ($model->post_type) {
            case Post::TYPE_FILE:
            case Post::TYPE_DEFAULT:
                echo "<a href='" . Url::to(['blog/view', 'key' => $model->url]) . "'>";
                break;
            case Post::TYPE_URL:
                if ($model->url == '') {
                    echo "<a class='disable-url' href='javascript:void(0)'>";
                } else {
                    echo "<a target='_blank' href='" . $model->url . "'>";
                }
                break;
        }
        ?>
        <div class="image"
             style="background-image: url('<?= $model->image ?>')"></div>
        <div class="title">
            <?= $model->getTitle() ?>
        </div>
        <div class="desc">
            <?= $model->description ?>
        </div>
        </a>
        <?php if (($model->post_type == Post::TYPE_URL || $model->post_type == Post::TYPE_FILE) && $model->url_repository != '' || $model->url_snapcraft != '' || $model->url_download != ''): ?>
            <div class="url-block">
                <?php if ($model->url_download != ''): ?>
                    <a download href="<?= $model->url_download ?>">
                        <?= Html::img('images/common/website3.png') ?>
                    </a>
                <?php endif; ?>
                <?php if ($model->url_snapcraft != ''): ?>
                    <a target='_blank' href="<?= $model->url_snapcraft ?>">
                        <img alt="Get it from the Snap Store"
                             src="https://snapcraft.io/static/images/badges/en/snap-store-white.svg"/>
                    </a>
                <?php endif; ?>
                <?php if ($model->url_repository != ''): ?>
                    <a target='_blank' href="<?= $model->url_repository ?>">
                        <?= Html::img('images/common/github3.png') ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if ($model->is_soon): ?>
        <a class='disable-url' href="javascript:void(0)">
            <?= Html::img('images/common/coming.png') ?>
            <div class="image" style="background-image: url('<?= $model->image ?>')"></div>
            <div class="title">
                <?= $model->title ?>
            </div>
            <div class="date">
                <?= date("F j, Y") ?>
            </div>
        </a>
    <?php else: ?>
        <a href="<?= Url::to(['blog/view', 'key' => $model->url]) ?>">
            <div class="image" style="background-image: url('<?= $model->image ?>')"></div>
            <div class="title">
                <?= $model->title ?>
            </div>
            <div class="date">
                <?= date("F j, Y", $model->created_at) ?>
            </div>
        </a>
    <?php endif; ?>
<?php endif; ?>






