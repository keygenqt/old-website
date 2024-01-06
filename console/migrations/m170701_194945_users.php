<?php

use yii\db\Migration;
use yii\db\Schema;

class m170701_194945_users extends Migration
{
    public function safeUp()
    {
        $this->createTable('admins', [
            'id' => Schema::TYPE_PK,
            'email' => Schema::TYPE_STRING,
            'password' => Schema::TYPE_STRING,
            'blocked' => Schema::TYPE_INTEGER . ' not null default 0',
            'created_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');

        $this->createTable('users', [
            'id' => Schema::TYPE_PK,
            'email' => Schema::TYPE_STRING,
            'password' => Schema::TYPE_STRING,
            'blocked' => Schema::TYPE_INTEGER . ' not null default 0',
            'created_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');

        $this->insert('admins', [
            'email' => 'keygenqt@gmail.com',
            'password' => '$2y$13$eNdoClRrXB89kDOW6ogUc.YqMKYb7tKl0IC5uUaS1.RctInzjt1mu',
            'created_at' => time() + 7
        ]);
        $this->insert('users', [
            'email' => 'keygenqt@gmail.com',
            'password' => '$2y$13$eNdoClRrXB89kDOW6ogUc.YqMKYb7tKl0IC5uUaS1.RctInzjt1mu',
            'created_at' => time() + 7
        ]);
    }

    public function safeDown()
    {
        echo "m170701_194945_users cannot be reverted.\n";
        return false;
    }
}
