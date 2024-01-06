<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200302_061847_stat
 */
class m200302_061847_stat extends Migration
{
    public function safeUp()
    {
        $this->addColumn('statistics', 'created_at', Schema::TYPE_INTEGER);
        $this->addColumn('statistics', 'ip', Schema::TYPE_STRING);
        $this->addColumn('statistics', 'model_id', Schema::TYPE_INTEGER);
    }

    public function safeDown()
    {
        echo "m200302_061847_stat cannot be reverted.\n";
        return false;
    }
}
