<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m220901_031143_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
        ]);

        // make relation with user table in user_id column on posts table and id column on user table
        $this->addForeignKey(
            'fk-posts-user_id',
            'posts',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drop relation with user table in user_id column on posts table and id column on user table
        $this->dropForeignKey(
            'fk-posts-user_id',
            'posts'
        );
        
        $this->dropTable('{{%posts}}');
    }
}
