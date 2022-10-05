<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m221005_120556_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime()->notNull(),
            'customer_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-order-customer_id',
            'order',
            'customer_id',
            'customer',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
