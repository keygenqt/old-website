<?php

/* @var $this yii\web\View */
/* @var $categories */
/* @var $category */
/* @var $model Post */

$class = $model->is_work ? 'work' : 'blog';

$this->title = 'Keygenqt | ' . ($model->is_work ? 'Work' : 'Blog');

use common\models\Post;
use keygenqt\components\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

$provider = $model->searchFrontend(['Post' => ['category_id' => $category]], $model->is_work ? SORT_DESC : SORT_DESC);
?>

<div class="<?= $class ?>-1 row">
    <div class="cell">
        <div class="page">
            <div class="filter-list">
                <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                <?= Html::dropDownList('category', $category, $categories,
                    ['onchange' => 'window.location.href = "' . Url::to([$class . '/index', 'page' => 1]) . '/" + $(this).val()']) ?>
                <?php ActiveForm::end(); ?>
            </div>

            <?= ListView::widget([
                'dataProvider' => $provider,
                'layout' => "{items}{pager}",
                'summary' => '',
                'itemView' => '_list',
                'itemOptions' => ['tag' => 'li', 'class' => $class . '-item'],
                'options' => [
                    'tag' => 'ul',
                    'class' => $class . '-items'
                ],
                'pager' => [
                    'class' => 'keygenqt\linkPager\LinkPager',
                    'maxButtonCount' => 5,
                ],
            ]);
            ?>
        </div>
    </div>
</div>