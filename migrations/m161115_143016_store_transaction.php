<?php



use yii\db\Schema;
use yii\db\Migration;

class m161115_143016_store_transaction extends Migration
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
            'store_transaction',
            [
                'id'=> $this->primaryKey(11),
                'element_id'=> $this->integer(11)->notNull(),
                'store_id'=> $this->integer(11)->notNull(),
                'type'=> $this->string()->notNull(),
                'reason'=> $this->string()->notNull(),
                'reason_id'=> $this->integer(11)->null()->defaultValue(null),
                'amount'=> $this->integer(11)->notNull(),
                'date'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
                'user_id'=> $this->integer(11)->null()->defaultValue(null),
                'comment'=> $this->string(500)->null()->defaultValue(null),
                'deleted'=> $this->datetime()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('fk_store_transaction_store_store_idx','{{%store_transaction}}','store_id',false);
        $this->createIndex('fk_store_transaction_store_element1_idx','{{%store_transaction}}','element_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('fk_store_transaction_store_store_idx', '{{%store_transaction}}');
        $this->dropIndex('fk_store_transaction_store_element1_idx', '{{%store_transaction}}');
        $this->dropTable('store_transaction');
    }
}
