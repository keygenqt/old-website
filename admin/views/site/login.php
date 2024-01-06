<?php

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\User $model
 */

use keygenqt\components\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';

$this->params['breadcrumbs'][] = $this->title;

\backend\assets\LayoutPageAsset::register($this);

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
    <table class="table-body">
        <tr>
            <td>
                <div class="panel-login well">

                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10"></div>
                    </div>

                    <h1><?= Html::img("images/logo.png") . Yii::$app->name ?></h1>

                    <?php if (Yii::$app->session->hasFlash('error')): ?>
                        <div class="error-summary"><p>Please fix the following errors:</p>
                            <ul>
                                <li><?= Yii::$app->session->getFlash('error') ?></li>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php $form = ActiveForm::begin([
                        'enableClientValidation' => false,
                        'enableAjaxValidation' => false,
                        'encodeErrorSummary' => false,
                        'options' => [
                            'data-pjax' => true,
                            'class' => 'gray',
                            'autocomplete' => 'off'
                        ]
                    ]); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->input('password') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </td>
        </tr>
    </table>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>