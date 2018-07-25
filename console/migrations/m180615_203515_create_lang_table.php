<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lang`.
 */
class m180615_203515_create_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('lang', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'local' => $this->string(),
            'name' => $this->string(),
            'default' => $this->smallInteger(),
            'date_update' => $this->string(),
            'date_create' => $this->string(),
        ]);
        $this->batchInsert('lang', ['url', 'local', 'name', 'default', 'date_update', 'date_create'], [
            ['en', 'en-EN', 'English', 0, time(), time()],
            ['ru', 'ru-RU', 'Русский', 1, time(), time()],
            ['ua', 'ua-UA', 'Українська', 0, time(), time()],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('lang');
    }
}
