<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'role' => $this->smallInteger(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->batchInsert('user',
            ['username', 'auth_key', 'email', 'password_hash', 'role'],
            [
                ['admin', 'nGQzBaFSAHGuYYbv1upY_yog17H_fM55', 'admin@gmail.com', '$2y$13$HWkNrUIbePxquT3o8bqho.ce7QTMlbVpRhovvnl.oCvyQXg9JP/H.', 1,],

            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
