<?php

use yii\db\Migration;

/**
 * Class m200307_074844_update
 */
class m200307_074844_update extends Migration
{
    public function safeUp()
    {
        $this->addColumn('sentences', 'order', \yii\db\mysql\Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER ru');
        $this->addColumn('sentences', 'paragraph', \yii\db\mysql\Schema::TYPE_INTEGER . ' not null default 0 ' . ' AFTER ru');
    }

    public function safeDown()
    {
        echo "m200307_074844_update cannot be reverted.\n";
        return false;
    }
}
