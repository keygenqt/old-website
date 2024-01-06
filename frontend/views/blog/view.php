<?php

/* @var $this yii\web\View */
/* @var $model Post */
/* @var $params array */

$this->title = 'Keygenqt | ' . $model->getTitle();

use common\models\Post;
use keygenqt\components\Html;

?>

<div class="blog-view row">
    <div class="cell" style="vertical-align: top">
        <div class="page">

            <div class="title">
                <?= $model->getTitle() ?>
            </div>

            <?php if (!empty($model->image_body)): ?>
                <div class="image">
                    <?= Html::img($model->image_body) ?>
                </div>
            <?php endif; ?>

            <div class="body">
                <?php
                switch ($model->post_type) {
                    case Post::TYPE_DEFAULT:
                        echo $model->text;
                        break;
                    case Post::TYPE_FILE:
                        echo $this->render($model->file_path, ['model' => $model, 'params' => $params]);
                        break;
                }
                ?>
            </div>

            <div class="date">
                <?= date("F j, Y", $model->created_at) ?>
            </div>

        </div>
    </div>
</div>

<?php if ($model->post_type == Post::TYPE_DEFAULT): ?>
<script>
    $(function () {
        $('a[href^="https://"]').not('a[href*=keygenqt]').attr('target','_blank');
    });
</script>
<?php endif; ?>
