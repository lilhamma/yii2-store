<?php

use yii\db\Schema;
use yii\db\Migration;

class m161115_143011_store_element extends Migration
{
    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            'store_element',
            [
                'id'=> $this->primaryKey(11),
                'model'=> $this->string(255)->notNull(),
                'item_id'=> $this->integer(11)->notNull(),
                'category_id'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('fk_store_element_store_element_category1_idx','{{%store_element}}','category_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('fk_store_element_store_element_category1_idx', '{{%store_element}}');
        $this->dropTable('store_element');
    }
}
