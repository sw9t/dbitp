<?php

use yii\db\Migration;


class m171212_231000_create_new_table_tickects_comments extends Migration
{
    public $tableName = '{{%tickets_comments}}';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'ticket_id'=>$this->integer(),
            'declarer_id'=>$this->integer(),
            'created_at'=>'timestamp not null default current_timestamp',
            'is_deleted'=>$this->integer(),
        ]);
        $this->addForeignKey('fk-ticket-comment',$this->tableName,'ticket_id','{{%tickets}}','id','CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
