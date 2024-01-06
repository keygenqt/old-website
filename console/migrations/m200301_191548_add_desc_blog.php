<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200301_191548_add_desc_blog
 */
class m200301_191548_add_desc_blog extends Migration
{
    public function safeUp()
    {
        $this->addColumn('blog', 'description', Schema::TYPE_TEXT);
    }

    public function safeDown()
    {
        echo "m200301_191548_add_desc_blog cannot be reverted.\n";
        return false;
    }
}
