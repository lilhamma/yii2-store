<?php



use yii\db\Schema;
use yii\db\Migration;

class m161115_143015_store_store extends Migration
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
            'store_store',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(255)->notNull(),
            ],$tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('store_store');
    }
}
