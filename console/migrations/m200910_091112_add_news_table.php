<?php

use console\libraries\db\Migration;

class m200910_091112_add_news_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(10)->unsigned()->notNull(),
            'url' => $this->text()->notNull(),
            'title' => $this->string(50)->notNull(),
            'summary' => $this->string(64)->notNull(),
            'content' => $this->text()->notNull(),
            'praise' => $this->integer(11)->notNull(),
            'createdAt' => $this->integer(10)->unsigned()->notNull(),
            'updatedAt' => $this->integer(10)->unsigned()->notNull(),
        ], $this->tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
