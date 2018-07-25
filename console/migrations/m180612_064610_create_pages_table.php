<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m180612_064610_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'main_slug' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(1),
            'order'=>$this->integer(),
            'updated_at' => $this->timestamp()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pages');
    }
}
