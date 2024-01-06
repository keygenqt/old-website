<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200528_011530_add_test
 */
class m200528_011530_add_test extends Migration
{
    public function safeUp()
    {
        $this->createTable('test', [
            'id' => Schema::TYPE_PK,
            'email' => Schema::TYPE_STRING,
        ], 'ENGINE=MyISAM CHARSET=utf8');

        $this->insert('test', [
            'email' => 'test1@gmail.com'
        ]);

        $this->insert('test', [
            'email' => 'email@gmail.com'
        ]);

        $this->insert('test', [
            'email' => 'gmail@gmail.com'
        ]);

        $this->insert('test', [
            'email' => 'keygenqt@gmail.ru'
        ]);

        $this->insert('test', [
            'email' => 'test@gmail.ua'
        ]);

        $this->insert('test', [
            'email' => 'my@gmail.com'
        ]);

        $this->insert('test', [
            'email' => 'new@gmail.com'
        ]);
    }

    public function safeDown()
    {
        echo "m200528_011530_add_test cannot be reverted.\n";
        return false;
    }
}
