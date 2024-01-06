<?php

use yii\db\Migration;
use yii\db\Schema;

class m200227_172757_categories extends Migration
{
    public function safeUp()
    {
        $this->createTable('categories_blog', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'order' => Schema::TYPE_INTEGER . ' not null default 0',
            'created_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');

        $this->createTable('categories_work', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'order' => Schema::TYPE_INTEGER . ' not null default 0',
            'created_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');
    }

    public function safeDown()
    {
        echo "m200227_172757_categories cannot be reverted.\n";
        return false;
    }
}
