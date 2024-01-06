<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200302_061836_add_text
 */
class m200302_061836_add_text extends Migration
{
    public function safeUp()
    {
        $this->addColumn('blog', 'text', Schema::TYPE_TEXT);
        $this->addColumn('blog', 'image_body', Schema::TYPE_TEXT);
    }

    public function safeDown()
    {
        echo "m200302_061836_add_text cannot be reverted.\n";
        return false;
    }
}
