<?php

use yii\db\Migration;

/**
 * Class m200314_114347_add_full_audio
 */
class m200314_114347_add_full_audio extends Migration
{
    public function safeUp()
    {
        $this->addColumn('translations_data', 'audio_full_name', \yii\db\mysql\Schema::TYPE_STRING . ' not null default "" ' . ' AFTER audio_index');
        $this->addColumn('translations_data', 'audio_author_name', \yii\db\mysql\Schema::TYPE_STRING . ' not null default "" ' . ' AFTER audio_full_name');
    }

    public function safeDown()
    {
        echo "m200314_114347_add_full_audio cannot be reverted.\n";
        return false;
    }
}
