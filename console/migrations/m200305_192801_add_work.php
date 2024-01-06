<?php

use yii\db\Migration;

/**
 * Class m200305_192801_add_work
 */
class m200305_192801_add_work extends Migration
{
    public function safeUp()
    {
        $this->addColumn('categories_blog', 'is_work', \yii\db\mysql\Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER title');
    }

    public function safeDown()
    {
        echo "m200305_192801_add_work cannot be reverted.\n";
        return false;
    }
}
