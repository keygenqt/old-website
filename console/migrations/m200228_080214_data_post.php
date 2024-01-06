<?php

use yii\db\Migration;

/**
 * Class m200228_080214_data_post
 */
class m200228_080214_data_post extends Migration
{
    public function safeUp()
    {
        // Server
        $this->insert('blog', [
            'url' => 'ubuntu-lamp',
            'title' => 'Установка и настройка lamp. Ubuntu 19.04',
            'created_at' => time()
        ]);

        $this->insert('blog', [
            'url' => 'artifactory',
            'title' => 'Установка и настройка artifactory. Ubuntu 19.04',
            'created_at' => time()
        ]);

        $this->insert('blog', [
            'url' => 'artifactory',
            'title' => 'HTTPS. Ubuntu 19.04',
            'created_at' => time()
        ]);

        $this->insert('blog', [
            'url' => 'domain',
            'title' => 'Domain. Получение. Подключение.',
            'created_at' => time()
        ]);

        $this->insert('blog', [
            'url' => 'web-composer-yii2',
            'title' => 'Composer. Yii2. Ubuntu 19.04.',
            'created_at' => time()
        ]);

        // Web Frontend
        $this->insert('blog', [
            'url' => 'web-java',
            'title' => 'CSS. Троеточие.',
            'created_at' => time()
        ]);

        $this->insert('blog', [
            'url' => 'web-java',
            'title' => 'CSS. Картинка в блоке.',
            'created_at' => time()
        ]);

        // Android
        $this->insert('blog', [
            'url' => 'android-java',
            'title' => 'Установка и настройка java. Ubuntu 19.04 для Android Studio.',
            'created_at' => time()
        ]);

        $this->insert('blog', [
            'url' => 'android-artifactory',
            'title' => 'Создание, загрузка библиотек в artifactory.',
            'created_at' => time()
        ]);

        // Logic
        $this->insert('blog', [
            'url' => 'introduction',
            'title' => 'Формальная логика. Введение.',
            'created_at' => time()
        ]);

        // Logic
        $this->insert('blog', [
            'url' => 'concept',
            'title' => 'Формальная логика. Понятие.',
            'created_at' => time()
        ]);

        // Philosophy
        $this->insert('blog', [
            'url' => 'a-priori',
            'title' => 'Синтетические суждения априори',
            'created_at' => time()
        ]);

        // Law
        $this->insert('blog', [
            'url' => 'law-51',
            'title' => 'Нужно знать: Статья 51',
            'created_at' => time()
        ]);
    }

    public function safeDown()
    {
        echo "m200228_080214_data_post cannot be reverted.\n";
        return false;
    }
}
