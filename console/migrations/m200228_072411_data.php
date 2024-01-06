<?php

use yii\db\Migration;

/**
 * Class m200228_072411_data
 */
class m200228_072411_data extends Migration
{
    public function safeUp()
    {
        $this->insert('categories_blog', [
            'title' => 'Server',
            'order' => 1,
            'created_at' => time() + 1
        ]);
        $this->insert('categories_blog', [
            'title' => 'Web Frontend',
            'order' => 2,
            'created_at' => time() + 2
        ]);
        $this->insert('categories_blog', [
            'title' => 'Android',
            'order' => 3,
            'created_at' => time() + 4
        ]);
        $this->insert('categories_blog', [
            'title' => 'Logic',
            'order' => 4,
            'created_at' => time() + 5
        ]);
        $this->insert('categories_blog', [
            'title' => 'Philosophy',
            'order' => 5,
            'created_at' => time() + 6
        ]);
        $this->insert('categories_blog', [
            'title' => 'Law',
            'order' => 6,
            'created_at' => time() + 7
        ]);
        $this->insert('categories_blog', [
            'title' => 'Other',
            'order' => 7,
            'created_at' => time() + 7
        ]);

        $this->insert('categories_work', [
            'title' => 'Linux',
            'order' => 1,
            'created_at' => time() + 5
        ]);
        $this->insert('categories_work', [
            'title' => 'Web Frontend',
            'order' => 2,
            'created_at' => time() + 2
        ]);
        $this->insert('categories_work', [
            'title' => 'Server',
            'order' => 3,
            'created_at' => time() + 1
        ]);
        $this->insert('categories_work', [
            'title' => 'Other',
            'order' => 4,
            'created_at' => time() + 5
        ]);
    }

    public function safeDown()
    {
        echo "m200228_072411_data_test cannot be reverted.\n";
        return false;
    }
}
