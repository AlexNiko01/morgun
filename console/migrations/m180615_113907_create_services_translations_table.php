<?php

use yii\db\Migration;

/**
 * Handles the creation of table `services_translations`.
 * Has foreign keys to the tables:
 *
 * - `services`
 */
class m180615_113907_create_services_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('services_translations', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->notNull(),
            'attachment_url' => $this->string(),
            'thumbnail_url' => $this->string(),
            'name' => $this->string(),
            'slug' => $this->string()->notNull(),
            'heading' => $this->text(),
            'content' => $this->text(),
            'excerpt' => $this->text(),
            'quote' => $this->text(),
            'title' => $this->string(),
            'description' => $this->text(),
            'keywords' => $this->text(),
            'lang' => $this->string(),
        ]);

        // creates index for column `service_id`
        $this->createIndex(
            'idx-services_translations-service_id',
            'services_translations',
            'service_id'
        );

        // add foreign key for table `services`
        $this->addForeignKey(
            'fk-services_translations-service_id',
            'services_translations',
            'service_id',
            'services',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `services`
        $this->dropForeignKey(
            'fk-services_translations-service_id',
            'services_translations'
        );

        // drops index for column `service_id`
        $this->dropIndex(
            'idx-services_translations-service_id',
            'services_translations'
        );

        $this->dropTable('services_translations');
    }
}
