<?php

use yii\db\Migration;

/**
 * Class m200308_225416_rename_book
 */
class m200308_225416_rename_book extends Migration
{
    public function safeUp()
    {
        $this->renameTable('books', 'translations');
        $this->renameTable('chapters', 'translations_data');
        $this->renameColumn('translations_data', 'book_id', 'translation_id');
    }

    public function safeDown()
    {
        echo "m200308_225416_rename_book cannot be reverted.\n";
        return false;
    }
}
