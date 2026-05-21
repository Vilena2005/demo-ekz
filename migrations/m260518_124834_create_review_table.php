<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%request}}`
 */
class m260518_124834_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        // creates index for column `request_id`
        $this->createIndex(
            '{{%idx-review-request_id}}',
            '{{%review}}',
            'request_id'
        );

        // add foreign key for table `{{%request}}`
        $this->addForeignKey(
            '{{%fk-review-request_id}}',
            '{{%review}}',
            'request_id',
            '{{%request}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%request}}`
        $this->dropForeignKey(
            '{{%fk-review-request_id}}',
            '{{%review}}'
        );

        // drops index for column `request_id`
        $this->dropIndex(
            '{{%idx-review-request_id}}',
            '{{%review}}'
        );

        $this->dropTable('{{%review}}');
    }
}
