<?php

use yii;

use yii\db\Schema;
use yii\db\Migration;

class m161115_143013_store_exchange extends Migration
{

    public function init()
    {
        $this->db = Yii::$app->getModule('LilhammaStore')->db;
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            'store_exchange',
            [
                'id'=> $this->primaryKey(11),
                'element_id'=> $this->integer(11)->notNull(),
                'store_id_from'=> $this->integer(11)->notNull(),
                'store_id_to'=> $this->integer(11)->notNull(),
                'amount'=> $this->integer(11)->notNull(),
                'user_id'=> $this->integer(11)->notNull(),
                'status'=> $this->string()->notNull()->defaultValue('created'),
                'date'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
                'comment'=> $this->text()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('fk_store_exchange_store_store1_idx','{{%store_exchange}}','store_id_from',false);
        $this->createIndex('fk_store_exchange_store_store2_idx','{{%store_exchange}}','store_id_to',false);
        $this->createIndex('fk_store_exchange_store_element1_idx','{{%store_exchange}}','element_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('fk_store_exchange_store_store1_idx', '{{%store_exchange}}');
        $this->dropIndex('fk_store_exchange_store_store2_idx', '{{%store_exchange}}');
        $this->dropIndex('fk_store_exchange_store_element1_idx', '{{%store_exchange}}');
        $this->dropTable('store_exchange');
    }
}
