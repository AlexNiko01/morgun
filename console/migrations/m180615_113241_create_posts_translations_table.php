<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts_translations`.
 * Has foreign keys to the tables:
 *
 * - `posts`
 */
class m180615_113241_create_posts_translations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts_translations', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'intro_id' => $this->integer(),
            'attachment_id' => $this->integer(),
            'thumbnail_id' => $this->integer(),
            'heading' => $this->text(),
            'name' => $this->string(),
            'slug' => $this->string()->notNull(),
            'content' => $this->text(),
            'excerpt' => $this->string(),
            'tag' => $this->text(),
            'title' => $this->string(),
            'description' => $this->text(),
            'keywords' => $this->text(),
            'lang' => $this->string(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-posts_translations-post_id',
            'posts_translations',
            'post_id'
        );

        // add foreign key for table `posts`
        $this->addForeignKey(
            'fk-posts_translations-post_id',
            'posts_translations',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `posts`
        $this->dropForeignKey(
            'fk-posts_translations-post_id',
            'posts_translations'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-posts_translations-post_id',
            'posts_translations'
        );

        $this->dropTable('posts_translations');
    }
}
