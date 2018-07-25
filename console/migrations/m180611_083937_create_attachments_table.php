<?php

use yii\db\Migration;

/**
 * Handles the creation of table `attachments`.
 */
class m180611_083937_create_attachments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attachments', [
            'id' => $this->primaryKey(),
            'path' => $this->string(),
            'mob_path' => $this->string(),
            'url' => $this->string(),
            'mob_url' => $this->string(),
            'alt' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('attachments');
    }
}
