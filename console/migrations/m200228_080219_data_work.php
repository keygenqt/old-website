<?php

use yii\db\Migration;

/**
 * Class m200228_080219_data_work
 */
class m200228_080219_data_work extends Migration
{
    public function safeUp()
    {
        // Linux
        $this->insert('work', [
            'url' => 'linux-screener',
            'title' => 'Screenshot, etc.',
            'description' => 'Easy app for the linux.',
            'created_at' => time()
        ]);
    }

    public function safeDown()
    {
        echo "m200228_080219_data_work cannot be reverted.\n";
        return false;
    }
}
