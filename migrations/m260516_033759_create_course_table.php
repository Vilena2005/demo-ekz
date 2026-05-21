<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 */
class m260516_033759_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->insert('{{%course}}', [
            'name' => 'Основы алгоритмизации и программирования',
        ]);

        $this->insert('{{%course}}', [
            'name' => 'Основы веб-дизайна',
        ]);

        $this->insert('{{%course}}', [
            'name' => 'Основы проектирования баз данных',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%course}}');
    }
}
