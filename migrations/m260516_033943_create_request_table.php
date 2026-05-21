<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%course}}`
 */
class m260516_033943_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'status' => "ENUM('new','in_progress', 'done') DEFAULT 'new'",
            'payment_method' => "ENUM('cash','card') NOT NULL",
            'started_at' => $this->date()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-request-user_id}}',
            '{{%request}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-request-user_id}}',
            '{{%request}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-request-course_id}}',
            '{{%request}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-request-course_id}}',
            '{{%request}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-request-user_id}}',
            '{{%request}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-request-user_id}}',
            '{{%request}}'
        );

        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-request-course_id}}',
            '{{%request}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-request-course_id}}',
            '{{%request}}'
        );

        $this->dropTable('{{%request}}');
    }
}
