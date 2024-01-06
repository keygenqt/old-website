<?php

use yii\db\Migration;
use yii\db\Schema;

class m200227_172804_blog extends Migration
{
    public function safeUp()
    {
        $this->createTable('blog', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER,
            'image' => Schema::TYPE_STRING,
            'url' => Schema::TYPE_STRING,
            'title' => Schema::TYPE_STRING,
            'blocked' => Schema::TYPE_INTEGER . ' not null default 0',
            'update_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');
    }

    public function safeDown()
    {
        echo "m200227_172804_blog cannot be reverted.\n";
        return false;
    }
}
