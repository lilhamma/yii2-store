<?php



use yii\db\Schema;
use yii\db\Migration;

class m161115_143014_store_remain extends Migration
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
            'store_remain',
            [
                'id'=> $this->primaryKey(11),
                'element_id'=> $this->integer(11)->notNull(),
                'store_id'=> $this->integer(11)->notNull(),
                'amount'=> $this->integer(11)->notNull(),
                'comment'=> $this->text()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('fk_store_remain_store_element1_idx','{{%store_remain}}','element_id',false);
        $this->createIndex('fk_store_remain_store_store1_idx','{{%store_remain}}','store_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('fk_store_remain_store_element1_idx', '{{%store_remain}}');
        $this->dropIndex('fk_store_remain_store_store1_idx', '{{%store_remain}}');
        $this->dropTable('store_remain');
    }
}
