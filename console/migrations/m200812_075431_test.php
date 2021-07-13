<?php

use console\libraries\db\Migration;

class m200812_075431_test extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(10)->unsigned()->notNull(),
            'userName' => $this->string('128')->notNull(),
            'password' => $this->string(255)->notNull(),
            'firstName' => $this->string(64)->notNull(),
            'lastName' => $this->string(64)->notNull(),
            'createdAt' => $this->integer(10)->unsigned()->notNull(),
            'updatedAt' => $this->integer(10)->unsigned()->notNull(),
        ], $this->tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
