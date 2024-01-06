<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200322_210820_add_url_youtube
 */
class m200322_210820_add_url_youtube extends Migration
{
    public function safeUp()
    {
        $this->addColumn('translations_data', 'video_author_url', Schema::TYPE_STRING . ' not null default "" ' . ' AFTER audio_author_name');
    }

    public function safeDown()
    {
        echo "m200322_210820_add_url_youtube cannot be reverted.\n";
        return false;
    }
}
