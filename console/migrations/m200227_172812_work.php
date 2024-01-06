<?php

use yii\db\Migration;
use yii\db\Schema;

class m200227_172812_work extends Migration
{
    public function safeUp()
    {
        $this->createTable('work', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER,
            'image' => Schema::TYPE_STRING,
            'url' => Schema::TYPE_STRING,
            'title' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'blocked' => Schema::TYPE_INTEGER . ' not null default 0',
            'update_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');
    }

    public function safeDown()
    {
        echo "m200227_172812_work cannot be reverted.\n";
        return false;
    }
}
