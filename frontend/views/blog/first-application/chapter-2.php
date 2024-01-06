<?php

/* @var $this yii\web\View */

use common\models\Post;
use frontend\assets\FontAwesomeAssets;
use frontend\assets\TippyAsset;
use keygenqt\components\Html;

/* @var $model Post */

$this->title = $model->getTitle();

FontAwesomeAssets::register($this);
TippyAsset::register($this);

?>

<style>
    .blog-view .body .f-application {
        text-align: center;
    }

    .blog-view .body .f-application p,
    .blog-view .body .f-application div.p {
        margin: auto;
        padding-bottom: 30px;
        text-align: left;
    }

    .blog-view .body .f-application .end {
        padding-top: 20px;
        margin-top: 60px;
        border-top: 1px solid #d6d6d6;
        text-align: left;
    }

    .blog-view .body .f-application .chapter-subtitle {
        font-size: 22px;
        text-align: left;
        display: block;
    }

    .blog-view .body .f-application ul {
        text-align: left;
    }

    .blog-view .body .f-application .image-info {
        border: 1px solid #d6d6d6;
        width: 70%;
    }

    .blog-view .body .f-application .code {
        background: #2b2b2b;
        color: white;
        font-size: 14px;
        padding: 10px 20px;
        margin-bottom: 30px;
        text-align: left;
    }

    .blog-view .body .f-application .code::before {
        content: "$";
        color: white;
        position: relative;
        left: -7px;
    }

    .blog-view .body .f-application .code span {
        color: #adb2c1;
    }

    .black .blog-view .body .f-application .image-info {
        padding: 0;
        border: 0;
    }

    @media (max-width: 600px) {
        .blog-view .body .f-application .end {
            margin-top: 40px;
        }
    }
    @media (max-width: 600px) {
        .black .blog-view .body .f-application .image-info {
            padding: 0;
            width: 100%;
        }
    }
</style>

<div class="f-application">

    <?= Html::img('first-application/github/git.jpg', ['width' => '100%']) ?>

    <br>
    <br>
    <p>
        Регистрация прошла успешно на github? Если нет, рано тебе это читать. Создадим репозиторий на сервисе. Результат
        должен быть таким:
    </p>

    <?= Html::img('first-application/github/screenshot-1.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        Нам понадобится ssh ключ чтобы не заниматься гемором с паролями. Генерим его в терминале:
    </p>

    <div class="code">ssh-keygen</div>

    <p>
        Результат
    </p>

    <?= Html::img('first-application/github/screenshot-2.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        Ключ готов. Добавим его на github. Для этого скопипастим из id_rsa.pub на сервис.
    </p>

    <div class="code">cat .ssh/id_rsa.pub</div>

    <p>
        Результат
    </p>

    <?= Html::img('first-application/github/screenshot-3.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        Добавляем ключ на сервис.
    </p>

    <?= Html::img('first-application/github/screenshot-5.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        Title - от балды
        <br>
        Key - это все то что лежит в файле id_rsa.pub
        <br>
        <br>
        Наш репозиторий почти готов. Теперь выберите себе место куда мы его скачаем. У меня это Documents. Открываем
        терминал.
    </p>

    <?= Html::img('first-application/github/screenshot-6.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        Копируем с первого скрина ssh url и выполняем команду.
    </p>

    <div class="code">git clone git@github.com:keygenqt/assistant.git</div>

    <?= Html::img('first-application/github/screenshot-7.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        Не забудьте поставить git :)
    </p>

    <?= Html::img('first-application/github/screenshot-8.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        Done. Репозиторий под наше приложение готов.
    </p>

    <p>
        Давайте чутка по git-у расскажу. Git - система контроля версий. По простому это место хранения файлов ваших
        проектов. Он сохраняет историю ваших изменений. И помогает решать проблемы между прогерами - “Кто запушил на
        сервак эту дрянь!”, “Открывай прод, там багов куча!”, “Кто последний тот и мержит” :)
    </p>

    <div class="p">
        Основные команды которые нужно знать:
        <ul>
            <li>
                <b>git pull</b> - затягивает все из репозитория к тебе
            </li>
            <li>
                <b>git add .</b> - добавляет все новые файлы
            </li>
            <li>
                <b>git commit -m 'My Commit'</b> - делаем коммит, перед заливкой нужно сказать что ты туда добавил
            </li>
            <li>
                <b>git push</b> - заливает наш commit в репозиторий
            </li>
        </ul>
        <br>
        А дальше го маны курить по гиту.
    </div>

    <p>
        Добавим опознавательные знаки для гита, чтобы он понимал кто к нему обращается:
    </p>

    <div class="code">git config --global user.email "my@email.com"</div>
    <div class="code">git config --global user.name "MyName"</div>

    <p>
        Все готово. Заливаем. Следите за руками.
    </p>

    <div class="code">cd assistant <span># Переходим в нашу папку </span></div>
    <div class="code">git pull <span># Затягиваем все что есть </span></div>
    <div class="code">echo "MY APP" >> README.md <span># Создаем файл README.md</span></div>
    <div class="code">git add . <span># Добавляем все</span></div>
    <div class="code">git commit -m 'first commit' <span># Делаем комментарий</span></div>
    <div class="code">git push <span># Заливаем на сервер</span></div>

    <?= Html::img('first-application/github/screenshot-9.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <p>
        В итоге у вас должно быть что то похожее на это
    </p>

    <?= Html::img('first-application/github/screenshot-10.png', ['class' => 'image-info']) ?>

    <br>
    <br>
    <br>
    <b class="chapter-subtitle">Домашнее задание</b>
    <hr>
    <ul>
        <li>
            Помучайте git.
        </li>
        <li>
            В IDEA есть gui для git, юзать будем его (но консоль - база, fyi)
        </li>
    </ul>

    <div class="end">
        Продолжение следует.
    </div>

</div>