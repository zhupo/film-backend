<?php

use console\libraries\db\Migration;

class m201107_073451_add_comment_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(10)->unsigned()->notNull(),
            'entityId' => $this->integer(10)->unsigned()->notNull(),
            'entityType' => $this->tinyInteger(1)->unsigned()->notNull(),
            'content' => $this->text()->notNull(),
            'createBy' => $this->integer(10)->unsigned()->notNull(),
            'createdAt' => $this->integer(10)->unsigned()->notNull(),
            'updatedAt' => $this->integer(10)->unsigned()->notNull()
        ], $this->tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
