<?php

use yii\db\Migration;

/**
 * Handles adding parent_id to table `pages`.
 */
class m180725_131820_add_parent_id_column_to_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'parent_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pages', 'parent_id');
    }
}
