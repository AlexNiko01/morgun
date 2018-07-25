<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages_translations`.
 * Has foreign keys to the tables:
 *
 * - `pages`
 */
class m180615_113351_create_pages_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pages_translations', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'attachment_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'slug' => $this->string()->notNull(),
            'settings' => $this->text(),
            'title' => $this->string(),
            'description' => $this->text(),
            'keywords' => $this->text(),
            'lang' => $this->string(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            'idx-pages_translations-page_id',
            'pages_translations',
            'page_id'
        );

        // add foreign key for table `pages`
        $this->addForeignKey(
            'fk-pages_translations-page_id',
            'pages_translations',
            'page_id',
            'pages',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `pages`
        $this->dropForeignKey(
            'fk-pages_translations-page_id',
            'pages_translations'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            'idx-pages_translations-page_id',
            'pages_translations'
        );

        $this->dropTable('pages_translations');
    }
}
