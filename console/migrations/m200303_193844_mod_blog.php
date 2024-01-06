<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200303_193844_mod_blog
 */
class m200303_193844_mod_blog extends Migration
{
    public function safeUp()
    {
        $this->addColumn('blog', 'is_soon', Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER blocked');
        $this->addColumn('blog', 'is_user', Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER is_soon');
        $this->addColumn('blog', 'is_file', Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER is_user');
        $this->addColumn('blog', 'file_path', Schema::TYPE_STRING . ' AFTER url');
    }

    public function safeDown()
    {
        echo "m200303_193844_mod_blog cannot be reverted.\n";
        return false;
    }
}
