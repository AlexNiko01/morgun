<?php

use yii\db\Migration;

/**
 * Handles the creation of table `services`.
 * Has foreign keys to the tables:
 *
 * - `attachment`
 * - `galleries`
 */
class m180612_070624_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('services', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'updated_at' => $this->timestamp()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'order' => $this->smallInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('services');
    }
}
