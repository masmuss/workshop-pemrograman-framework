<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statistic}}`.
 */
class m221005_123514_create_statistic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%statistic}}', [
            'id' => $this->primaryKey(),
            'acces_time' => $this->dateTime()->notNull(),
            'user_ip' => $this->string(20)->notNull(),
            'user_host' => $this->string(50)->notNull(),
            'path_info' => $this->string(50)->notNull(),
            'query_string' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%statistic}}');
    }
}
