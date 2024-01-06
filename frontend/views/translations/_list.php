<?php

/* @var $model TranslationData */

use common\models\TranslationData;
use yii\helpers\Url;

$coming = empty($model->text);

$translation = \common\models\Translation::findOne(['id' => $model->translation_id]);

?>

<a href="<?= Url::to(['translations/view', 'key' => $model->url]) ?>">
    <div class="image"
         style="background-image: url('<?= $translation->image ?>')"></div>
    <div class="title">
        <?= $model->title ?>
    </div>
    <div class="desc">
        <?= $translation->author ?>
    </div>
</a>


