<?php

use yii\db\Migration;

/**
 * Class m200305_192316_rename_tables
 */
class m200305_192316_rename_tables extends Migration
{
    public function safeUp()
    {
        $this->renameTable('categories_work', 'books');
        $this->renameTable('blog', 'posts');
        $this->renameTable('work', 'chapters');

        $this->addColumn('posts', 'is_work', \yii\db\mysql\Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER is_file');
    }

    public function safeDown()
    {
        echo "m200305_192316_rename_tables cannot be reverted.\n";
        return false;
    }
}
