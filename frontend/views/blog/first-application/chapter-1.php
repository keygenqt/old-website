<?php

/* @var $this yii\web\View */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\TippyAsset;
use keygenqt\components\Html;
use yii\helpers\Url;

/* @var $model Post */

$this->title = $model->getTitle();

FontAwesomeAssets::register($this);
TippyAsset::register($this);

?>

<style>
    .blog-view .body .f-application {

    }

    .blog-view .body .f-application p,
    .blog-view .body .f-application div.p {
        margin: auto;
        padding-bottom: 30px;
    }

    .blog-view .body .f-application .end {
        padding-top: 20px;
        margin-top: 60px;
        border-top: 1px solid #d6d6d6;
    }

    .blog-view .body .f-application .chapter-subtitle {
        font-size: 22px;
    }

    .blog-view .body .f-application .preview-image {
        display: inline-block;
        text-decoration: underline;
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently */
    }

    .blog-view .body .f-application .preview-image:hover {
        color: #0b93d5;
    }

    @media (max-width: 600px) {
        .blog-view .body .f-application .end {
            margin-top: 40px;
        }
    }
</style>

<div class="f-application">

    <?= Html::img('first-application/start/prview1.jpg', ['width' => '100%']) ?>

    <br>
    <br>
    <p>
        В цикле статей опишу создание приложения с нуля до релиза со всем стеком технологий. Мы пройдемся от создания
        репозитория на github до релиза приложения в Ubuntu Software. Работать будем в linux.
    </p>

    <b class="chapter-subtitle">Оглавление</b>
    <hr>

    <ul>
        <?php foreach (Post::find()->where(['category_id' => 13])->all() as $key => $item): ?>
            <?php /* @var $item Post */ ?>
            <?php if (strpos($item->getTitle(), "Пишем на kotlin") === false) continue ?>
            <li>
                <a href="<?= Url::to(['blog/view', 'key' => $item->url]) ?>"><?= $item->getTitle() ?></a>
            </li>
        <?php endforeach; ?>
        <li>
            Продолжение следует.
        </li>
    </ul>

    <br>
    <br>

    <b class="chapter-subtitle">Задача</b>
    <hr>
    <br>

    <p>
        Написать приложение которое позволяет пользователю переименовать файлы в папке по заданному шаблону. Поиск
        файлов в папке задается регуляркой. Дать возможность выбрать все файлы в директории (для тех, кто далек от
        регулярных выражений). Переименование должно задаваться шаблоном {text}{index}. Добавить возможность выровнять
        индекса нулями (00001). Добавить возможность указывать количество нулей впереди индекса, если не указано, то
        автоматически по количеству файлов. Если их указали меньше чем нужно - сообщение об ошибке).
    </p>

    <b class="chapter-subtitle">Основные технологии</b>
    <hr>

    <ul>
        <li>
            <a target="_blank" href="https://www.jetbrains.com/idea/download/">IntelliJ IDEA Community Edition</a>
        </li>
        <li>
            <a target="_blank" href="https://git-scm.com/">Git</a>
        </li>
        <li>
            <a target="_blank" href="https://gradle.org/">Gradle</a>
        </li>
        <li>
            <a target="_blank" href="https://kotlinlang.org/">Kotlin</a>
        </li>
        <li>
            <a target="_blank" href="https://www.oracle.com/java/">Java</a>
        </li>
        <li style="display: none">
            <a target="_blank" href="https://gtk.org/">GTK</a>
        </li>
        <li>
            <a target="_blank" href="https://snapcraft.io/">Snapcraft</a>
        </li>
        <li>
            <a target="_blank" href="https://ubuntu.com/">Linux (Ubuntu)</a>
        </li>
    </ul>

    <br>
    <br>
    <b class="chapter-subtitle">Краткое описание</b>
    <hr>
    <br>

    <p id="1">
        <b>IntelliJ IDEA Community Edition</b>.
        <br>
        Среда разработки.
    </p>
    <p>
        <b>Git</b>
        <br>
        Система управления версиями.
    </p>
    <p>
        <b>Gradle</b>
        <br>
        Система автоматической сборки.
    </p>
    <p>
        <b>Kotlin</b>
        <br>
        Статически типизированный язык программирования. Основной язык разработки.
    </p>
    <p>
        <b>Java</b>
        <br>
        Язык программирования. Мы его в прямом смысле юзать не будем. Java используется в библиотеках, которыми мы
        воспользуемся в kotlin. Знание java желательно.
    </p>
    <p style="display: none">
        <b>GTK</b>
        <br>
        Кроссплатформенная библиотека элементов интерфейса.
    </p>
    <p>
        <b>Snapcraft</b>
        <br>
        Система развёртки и управления пакетами.
    </p>
    <div class="p">
        <b>Linux</b>
        <br>
        Харе выкидывать бабки на
        <div id="first" class="preview-image">терки</div>
        , или заниматься постоянной
        <div id="second" class="preview-image">переустановкой</div>
        , ставьте Linux.
    </div>

    <br>
    <b class="chapter-subtitle">Домашнее задание</b>
    <hr>
    <ul>
        <li>
            Зарегистрируйтесь на github
        </li>
        <li>
            Установите среду разработки
        </li>
        <li>
            Почитайте по темам выше
        </li>
    </ul>

</div>

<div id="template1" style="display: none;">
    <?= Html::img("first-application/start/terka-apple-4.jpg", ["width" => "100%"]) ?>
</div>

<div id="template2" style="display: none;">
    <?= Html::img("first-application/start/screenshot-68.png", ["width" => "100%"]) ?>
</div>

<script>
    $(function () {
        tippy('#first', {
            content: document.getElementById('template1').innerHTML,
            allowHTML: true,
            maxWidth: 350
        });
        tippy('#second', {
            content: document.getElementById('template2').innerHTML,
            allowHTML: true,
            maxWidth: 550
        });
    })
</script>