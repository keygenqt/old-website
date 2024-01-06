<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200519_204709_add_code
 */
class m200519_204709_add_code extends Migration
{
    public function safeUp()
    {
        $this->addColumn('posts', 'code', Schema::TYPE_STRING . ' not null default "" ' . ' AFTER url_repository');
    }

    public function safeDown()
    {
        echo "m200519_204709_add_code cannot be reverted.\n";
        return false;
    }
}
