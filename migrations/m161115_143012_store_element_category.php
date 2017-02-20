<?php

use yii;

use yii\db\Schema;
use yii\db\Migration;

class m161115_143012_store_element_category extends Migration
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
            'store_element_category',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->integer(11)->notNull(),
                'parent_id'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('fk_store_element_category_store_element_category1_idx','{{%store_element_category}}','parent_id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('fk_store_element_category_store_element_category1_idx', '{{%store_element_category}}');
        $this->dropTable('store_element_category');
    }
}
