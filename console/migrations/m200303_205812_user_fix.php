<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200303_205812_user_fix
 */
class m200303_205812_user_fix extends Migration
{
    public function safeUp()
    {
        $this->addColumn('users', 'is_admin', Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER blocked');
        $this->dropTable('admins');
    }

    public function safeDown()
    {
        echo "m200303_205812_user_fix cannot be reverted.\n";
        return false;
    }
}
