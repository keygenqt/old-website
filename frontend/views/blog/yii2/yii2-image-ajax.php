<?php

/* @var $this yii\web\View */

/* @var $params array */

/* @var $model Post */

use common\models\Post;
use common\models\TestModel;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\RainbowAsset;
use frontend\controllers\AjaxController;
use frontend\widgets\Alert;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use keygenqt\imageAjax\ImageAjax;
use keygenqt\verticalMenu\VerticalMenu;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Keygenqt | ' . $model->getTitle();

FontAwesomeAssets::register($this);
RainbowAsset::register($this);

/* @var $model TestModel */

$model = $params['testModel'];

?>

<style>
    /*fix frontend*/

    .blog-view .body {
        margin-top: 30px;
    }

    .blog-view .title {
        display: none;
    }

    @media (max-width: 1040px) {
        .screener-1 {
            display: none;
        }
    }

    @media (max-width: 545px) {
        .screener-0 .block-index .panel-info pre,
        .screener-0 .block-index .panel-info div {
            display: none;
        }
    }

    /*fix frontend*/
</style>

<style>
    .screener-0 .block-index {
        background: #1c393e;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
    }

    .screener-0 .block-index .title {
        padding-top: 10px;
        padding-bottom: 15px;
        margin-bottom: 20px;
        display: block;
    }
</style>

<div class="page-row screener-0">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    Image Ajax
                </div>
                <div class="panel panel-info">

                    <p>
                        This is the ImageAjax widget and a Yii 2 enhanced wrapper for the <a target="_blank"
                                                                                             href="https://www.dropzonejs.com/">Dropzone
                            library</a>. A simple way to do ajax loading image on the site.
                        <br>
                        <br>
                    </p>

                    <div style="font-size: 24px;" class="title">
                        Installation
                    </div>

                    <div>
                        The preferred way to install this extension is through <a target="_blank"
                                                                                  href="http://getcomposer.org/download/">composer</a>.
                        <br>
                        <br>
                        Either add
                        <br>
                        <br>
                    </div>

                    <pre>
    <code data-language="php">"require": {
    "keygenqt/yii2-image-ajax": "*"
}</code>
</pre>

                    <div>
                        of your <a target="_blank" href="https://getcomposer.org/doc/">composer.json</a> file.
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-4 .block-index {
        background: #0b2906;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
    }

    .screener-4 .panel.panel-success {
        border: 1px solid #ffffff;
        background: #336333;
        color: #ffffff;
        padding: 10px;
    }
</style>

<?php if (Yii::$app->session->getFlash('success') != null): ?>
    <div class="page-row screener-4">
        <div class="page-cell">
            <div class="page1">
                <div class="block-index">
                    <div class="panel panel-success">
                        Form update successfully
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<style>
    .screener-2 .block-index {
        background: #ffffff;
        padding: 30px;
        color: #000000;
        border: 1px solid #727684;
        margin-bottom: 30px;
    }

    .screener-2 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }

    body.black .blog-view .screener-2 .title,
    body.black form .form-group label.control-label {
        color: #4F5364;
    }
    body.black form .form-group.has-error label.control-label {
        color: #F82A5A;
    }

    body.black .screener-2 .yii2-image-ajax .subtitle {
        background: white;
        color: #BBBBBB;;
    }

    .screener-2 form .form-group {
        margin-bottom: 15px;
    }

    .screener-2 form .form-group label.control-label {
        font-size: 16px;
        display: inline-block;
        margin-bottom: 5px;
    }

    .screener-2 .error-summary {
        background: #79000f;
        font-size: 16px;
    }
</style>

<div class="page-row screener-2">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">

                <div class="title">
                    Example form
                </div>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'image')->widget(ImageAjax::class, [
                    'label' => false,
                    'btnSelect' => 'Choose',
                    'btnDelete' => 'Delete',
                    'url' => ['ajax/upload-image', 'type' => AjaxController::IMAGE_TEST],
                    'subtitle' => 'This video will change its size to 350х350, so keep that in mind.',
                    'afterUpdate' => 'function() {
                        console.log("call afterUpdate")
                    }'
                ]) ?>

                <?= $form->field($model, 'integer')->textInput()->input('text', ['placeholder' => 'Integer']) ?>

                <?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => 'Email']) ?>

                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

<style>
    .screener-1 .block-index {
        background: #727684;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
    }

    .screener-1 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }
</style>

<div class="page-row screener-1">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    Example form code
                </div>
                <div class="panel panel-info">

<pre>
    <code data-language="php">&#60;?php $form = ActiveForm::begin(); ?>

&#60;?= $form->field($model, 'image')->widget(ImageAjax::class, [
    'label' => false,
    'btnSelect' => 'Choose',
    'btnDelete' => 'Delete',
    'url' => ['ajax/upload-image', 'type' => AjaxController::IMAGE_TEST],
    'subtitle' => 'This video will change its size to 350х350, so keep that in mind.',
    'afterUpdate' => 'function() {
        console.log("call afterUpdate")
    }'
]) ?>

&#60;?= $form->field($model, 'integer')->textInput()->input('text', ['placeholder' => 'Integer']) ?>

&#60;?= $form->field($model, 'email')->textInput()->input('email', ['placeholder' => 'Email']) ?>

&#60;?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

&#60;?php ActiveForm::end(); ?></code>
</pre>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-1 .block-index {
        background: #727684;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
    }

    .screener-1 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }
</style>

<div class="page-row screener-1">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    Example AjaxController
                </div>
                <div class="panel panel-info">

                    <div>
                        In the example was used <a target="_blank"
                                                   href="https://github.com/tokolist/yii-components/tree/master/protected/extensions/yiicomp/components/ImageHandler">ImageHandler</a>
                        You can get ImageHandler for composer & yii2 here: <a target="_blank"
                                                                              href="https://github.com/keygenqt/yii2-image-handler">GitHub</a>
                        <br>
                        <br>
                    </div>

                    <pre>
    <code data-language="php">class AjaxController extends FrontendController
{
    const IMAGE_TEST = 'test';

    public function actionUploadImage($type)
    {
        if (Yii::$app->request->isAjax) {
            $url = self::uploadFile($type, 'file');
            if ($url) {
                echo Json::encode([
                    'url' => $url,
                    'error' => false,
                ]);
            } else {
                echo Json::encode([
                    'error' => 'Error upload file.',
                ]);
            }
            exit;
        }
    }

    public static function uploadFile($type, $name)
    {
        $file = UploadedFile::getInstanceByName($name);

        if (!empty($file)) {
            if (
                strpos($file->extension, 'png') !== false ||
                strpos($file->extension, 'jpg') !== false ||
                strpos($file->extension, 'jpeg') !== false
            ) {

                $name = uniqid();

                /** @var ImageHandler $imageHandler */
                $imageHandler = \Yii::$app->get('ih');

                $filePath =
                    Yii::getAlias('@app/../frontend/web/images/' . $type . '/') . $name . '.jpg';

                try {
                    switch ($type) {
                        case self::IMAGE_TEST:
                            $imageHandler->load($file->tempName)
                                ->adaptiveThumb(350, 350)
                                ->save($filePath, ImageHandler::IMG_JPEG);
                            break;
                    }
                    return "/images/$type/$name.jpg";

                } catch (Exception $e) {
                    return false;
                }
            }
        }
        return false;
    }
}</code>
</pre>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .screener-3 .block-index {
        background: #3e3e3e;
        padding: 30px;
        color: #ffffff;
        border: 1px solid #727684;
        position: relative;
    }

    .screener-3 .block-index .title {
        font-size: 24px;
        padding-top: 10px;
        padding-bottom: 15px;
        display: block;
    }

    .screener-3 .block-index a {
        text-decoration: underline;
    }
</style>

<div class="page-row screener-3">
    <div class="page-cell">
        <div class="page1">
            <div class="block-index">
                <div class="title">
                    License
                </div>
                <div class="panel panel-info">
                    <a target="_blank" href="http://www.apache.org/licenses/LICENSE-2.0.txt">
                        Apache License, Version 2.0
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>