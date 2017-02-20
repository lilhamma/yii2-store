<?php

use yii;

use yii\db\Schema;
use yii\db\Migration;

class m161115_143018_Relations extends Migration
{

    public function init()
    {
       $this->db = Yii::$app->getModule('LilhammaStore')->db;
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_store_element_category_id','{{%store_element}}','category_id','store_element_category','id');
        $this->addForeignKey('fk_store_element_category_parent_id','{{%store_element_category}}','parent_id','store_element_category','id');
        $this->addForeignKey('fk_store_exchange_element_id','{{%store_exchange}}','element_id','store_element','id');
        $this->addForeignKey('fk_store_exchange_store_id_from','{{%store_exchange}}','store_id_from','store_store','id');
        $this->addForeignKey('fk_store_exchange_store_id_to','{{%store_exchange}}','store_id_to','store_store','id');
        $this->addForeignKey('fk_store_remain_element_id','{{%store_remain}}','element_id','store_element','id');
        $this->addForeignKey('fk_store_remain_store_id','{{%store_remain}}','store_id','store_store','id');
        $this->addForeignKey('fk_store_transaction_element_id','{{%store_transaction}}','element_id','store_element','id');
        $this->addForeignKey('fk_store_transaction_store_id','{{%store_transaction}}','store_id','store_store','id');
        $this->addForeignKey('fk_store_user_to_store_store_id','{{%store_user_to_store}}','store_id','store_store','id');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_store_element_category_id', '{{%store_element}}');
     $this->dropForeignKey('fk_store_element_category_parent_id', '{{%store_element_category}}');
     $this->dropForeignKey('fk_store_exchange_element_id', '{{%store_exchange}}');
     $this->dropForeignKey('fk_store_exchange_store_id_from', '{{%store_exchange}}');
     $this->dropForeignKey('fk_store_exchange_store_id_to', '{{%store_exchange}}');
     $this->dropForeignKey('fk_store_remain_element_id', '{{%store_remain}}');
     $this->dropForeignKey('fk_store_remain_store_id', '{{%store_remain}}');
     $this->dropForeignKey('fk_store_transaction_element_id', '{{%store_transaction}}');
     $this->dropForeignKey('fk_store_transaction_store_id', '{{%store_transaction}}');
     $this->dropForeignKey('fk_store_user_to_store_store_id', '{{%store_user_to_store}}');
    }
}
