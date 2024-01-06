<?php

/* @var $this yii\web\View */
/* @var $categories */
/* @var $book integer */
/* @var $model TranslationData */

$this->title = 'Keygenqt | Translate';

use common\models\TranslationData;
use keygenqt\components\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

$provider = $model->searchFrontend(['TranslationData' => ['translation_id' => $book]]);

?>

<div class="translations-1 row">
    <div class="cell">
        <div class="page">

            <div class="filter-list">
                <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                <?= Html::dropDownList('category', $book, $categories,
                    ['onchange' => 'window.location.href = "' . Url::to(['translations/index', 'page' => 1]) . '/" + $(this).val()']) ?>
                <?php ActiveForm::end(); ?>
            </div>

            <?= ListView::widget([
                'dataProvider' => $provider,
                'layout' => "{items}{pager}",
                'summary' => '',
                'itemView' => '_list',
                'itemOptions' => ['tag' => 'li', 'class' => 'translations-item'],
                'options' => [
                    'tag' => 'ul',
                    'class' => 'translations-items'
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