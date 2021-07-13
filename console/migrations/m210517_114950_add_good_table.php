<?php

use console\libraries\db\Migration;

class m210517_114950_add_good_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%good}}', [
            'id' => $this->primaryKey('10')->unsigned(),
            'title' => $this->string(255),
            'marketPrice' => $this->decimal(18, 5),
            'sellPrice' => $this->decimal(18, 5),
            'url' => $this->string(255),
            'message' => $this->text(),
            'click' => $this->integer(10),
            'stockQuantity' => $this->smallInteger(),
            'createdAt' => $this->integer(10),
            'updatedAt' => $this->integer(10)
        ], $this->tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{good}}');
    }
}
