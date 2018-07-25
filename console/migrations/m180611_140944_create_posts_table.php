<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m180611_140944_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'updated_at' => $this->timestamp()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
            'post_type'=> $this->string()

        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-posts-user_id',
            'posts',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-posts-user_id',
            'posts',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-posts-user_id',
            'posts'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-posts-user_id',
            'posts'
        );

        $this->dropTable('posts');
    }
}
