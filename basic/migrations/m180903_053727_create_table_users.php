<?php

use yii\db\Migration;

/**
 * Class m180903_053727_create_table_users
 */
class m180903_053727_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string(),
            'type' => $this->integer(2)->notNull(),
            'inn' => $this->integer(12),
            'organisation_name' => $this->string(),
        ]);
        $this->createIndex(
            'i_id',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'i_id',
            'users'
        );
        $this->dropTable('users');
    }

}
