<?php

use console\libraries\db\Migration;

class m201020_021443_add_photo_and_category_tables extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%photo_category}}', [
            'id' => $this->primaryKey(10)->unsigned()->notNull(),
            'name' => $this->string(64)->notNull(),
            'createdAt' => $this->integer(10)->unsigned()->notNull(),
            'updatedAt' => $this->integer(10)->unsigned()->notNull(),
        ], $this->tableOptions);

        $this->createTable('{{%photo}}', [
            'id' => $this->primaryKey(10)->unsigned()->notNull(),
            'categoryId' => $this->integer(10)->notNull(),
            'title' => $this->string(64)->notNull(),
            'url' => $this->text()->notNull(),
            'tags' => $this->string(50)->notNull(),
            'praise' => $this->integer(11)->notNull(),
            'summary' => $this->string(64)->notNull(),
            'content' => $this->text()->notNull(),
            'createdAt' => $this->integer(10)->unsigned()->notNull(),
            'updatedAt' => $this->integer(10)->unsigned()->notNull(),
        ], $this->tableOptions);

        $this->createTable('{{%photo_thumbnail}}', [
            'id' => $this->primaryKey(10)->unsigned()->notNull(),
            'photoId' => $this->integer(10)->notNull(),
            'src' => $this->text()->notNull(),
            'msrc' => $this->text()->notNull(),
            'alt' => $this->string(32)->notNull(),
            'title' => $this->string(64)->notNull(),
            'w' => $this->integer(10)->notNull(),
            'h' => $this->integer(10)->notNull(),
            'createdAt' => $this->integer(10)->unsigned()->notNull(),
            'updatedAt' => $this->integer(10)->unsigned()->notNull(),
        ], $this->tableOptions);

        $this->createIndex('idx-categoryId', '{{%photo}}', 'categoryId');
        $this->createIndex('idx-photoId', '{{%photo_thumbnail}}', 'photoId');
    }

    public function safeDown()
    {
        $this->dropTable('{{%photo_category}}');
        $this->dropTable('{{%photo}}');
        $this->dropTable('{{%photo_thumbnail}}');
    }
}
