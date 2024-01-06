<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200602_222220_add_download
 */
class m200602_222220_add_download extends Migration
{
    public function safeUp()
    {
        $this->addColumn('posts', 'url_download', Schema::TYPE_STRING . ' not null default "" ' . ' AFTER url');
    }

    public function safeDown()
    {
        echo "m200602_222220_add_download cannot be reverted.\n";
        return false;
    }
}
