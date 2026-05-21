<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m260504_122934_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'full_name'=>$this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'role' => "ENUM('admin','user') NOT NULL DEFAULT 'user'",
        ]);

        $this->insert('user', [
            'full_name' => 'Admin',
            'username' => 'moder',
            'password' => md5('moder'),
            'email' => 'moder',
            'phone' => '112',
            'role' => 'admin',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
