<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200312_072637_is_user
 */
class m200312_072637_is_user extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('sentences', 'chapter_id', 'translations_data_id');
        $this->addColumn('translations', 'is_user', Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER author');
    }

    public function safeDown()
    {
        echo "m200312_072637_is_user cannot be reverted.\n";
        return false;
    }
}
