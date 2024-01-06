<?php

/* @var $this yii\web\View */
/* @var $model \common\models\User */

$this->title = 'Keygenqt | Login';

use keygenqt\components\Html;
use yii\widgets\ActiveForm;

?>

<div class="login-1 row">
    <div class="cell">
        <div class="page">

            <div class="title">
                Login:
            </div>

            <div class="login-block">

                <?php $form = ActiveForm::begin([
                    'enableClientValidation' => false,
                    'enableAjaxValidation' => false,
                    'encodeErrorSummary' => false,
                    'options' => [
                        'data-pjax' => true,
                        'autocomplete' => 'off'
                    ]
                ]); ?>

                <?= $form->errorSummary($model); ?>

                <div class="row-1">
                    <?= $form->field($model, 'email') ?>
                </div>
                <div class="row-1">
                    <?= $form->field($model, 'password')->input('password') ?>
                </div>
                <div class="row-1">
                    <div class="form-group" style="margin-top: 15px;margin-bottom: -10px;">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>


                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>