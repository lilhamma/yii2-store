<?php



use yii\db\Schema;
use yii\db\Migration;

class m161115_143017_store_user_to_store extends Migration
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
            'store_user_to_store',
            [
                'id'=> $this->primaryKey(11),
                'store_id'=> $this->integer(11)->notNull(),
                'user_id'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('fk_store_user_to_store_store_store1_idx','{{%store_user_to_store}}','store_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('fk_store_user_to_store_store_store1_idx', '{{%store_user_to_store}}');
        $this->dropTable('store_user_to_store');
    }
}
