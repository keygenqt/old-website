<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200510_230246_add_urls_post
 */
class m200510_230246_add_urls_post extends Migration
{
    public function safeUp()
    {
        $this->addColumn('posts', 'url_snapcraft', Schema::TYPE_STRING . ' not null default "" ' . ' AFTER url');
        $this->addColumn('posts', 'url_repository', Schema::TYPE_STRING . ' not null default "" ' . ' AFTER url_snapcraft');
        $this->renameColumn('posts', 'is_file', 'post_type');
    }

    public function safeDown()
    {
        echo "m200510_230246_add_urls_post cannot be reverted.\n";
        return false;
    }
}
