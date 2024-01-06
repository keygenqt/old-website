<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200227_195112_statistics
 */
class m200227_195112_statistics extends Migration
{
    public function safeUp()
    {
        $this->createTable('statistics', [
            'id' => Schema::TYPE_PK,
            'key' => Schema::TYPE_STRING,
            'count' => Schema::TYPE_INTEGER . ' not null default 0',
            'update_at' => Schema::TYPE_INTEGER,
        ], 'ENGINE=MyISAM CHARSET=utf8');
    }

    public function safeDown()
    {
        echo "m200227_195112_statistics cannot be reverted.\n";
        return false;
    }
}
