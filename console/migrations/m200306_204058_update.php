<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200306_204058_update
 */
class m200306_204058_update extends Migration
{
    public function safeUp()
    {
        $this->addColumn('books', 'image', Schema::TYPE_STRING . ' AFTER id');
        $this->addColumn('books', 'author', Schema::TYPE_STRING . ' AFTER title');

        $this->createTable('sentences', [
            'id' => Schema::TYPE_PK,
            'chapter_id' => Schema::TYPE_INTEGER,
            'eng' => Schema::TYPE_TEXT,
            'ru' => Schema::TYPE_TEXT,
            'updated_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');

        $this->addColumn('chapters', 'book_id', Schema::TYPE_INTEGER . ' AFTER id');
        $this->addColumn('chapters', 'audio_index', Schema::TYPE_INTEGER . ' AFTER book_id');
        $this->addColumn('chapters', 'updated_at', Schema::TYPE_INTEGER . ' AFTER title');
        $this->dropColumn('chapters', 'category_id');
        $this->dropColumn('chapters', 'image');
        $this->dropColumn('chapters', 'description');
        $this->dropColumn('chapters', 'blocked');
        $this->dropColumn('chapters', 'update_at');

    }

    public function safeDown()
    {
        echo "m200306_204058_update cannot be reverted.\n";
        return false;
    }
}
