<?php

/* @var $this yii\web\View */
/* @var $code */

$this->title = 'Keygenqt | Login';

use keygenqt\components\Html;
use yii\widgets\ActiveForm;

?>

<style>
    .site-index.body .body-row.header-index-row {
        display: none;
    }
    .login-1 .title, .login-1 .login-block {
        max-width: 830px;
        text-align: center;
    }
    .black .code {
        color: white;
    }
    button {
        background: #2cb6e9;
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        color: white;
        margin-top: 20px;
    }
    input {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        text-align: center;
    }
    button:hover {
        cursor: pointer;
    }
</style>

<div class="login-1 row">
    <div class="cell">
        <div class="page">

            <div class="title"></div>

            <div class="login-block">
                <div class="code">
                    <?= $output ?>
                </div>
            </div>

            <div class="title"> </div>


        </div>
    </div>
</div>

<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("Copied the text");
    }
</script>