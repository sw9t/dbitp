<?php

use yii\db\Migration;


class m171212_225122_create_new_table_tickets extends Migration
{
    public $tableName = '{{%tickets}}';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'subject'=>$this->string(),
            'text' => $this->text(),
            'status_id'=>$this->integer(),
            'declarer_id'=>$this->integer(),
            'executor_id'=>$this->integer(),
            'created_at'=>'timestamp not null default current_timestamp',
            'updated_at'=>'timestamp default current_timestamp on update current_timestamp',
            'is_deleted'=>$this->integer(),
        ]);
        $this->addForeignKey('fk-user-declarer',$this->tableName,'declarer_id','{{%user}}','id','CASCADE');
        $this->addForeignKey('fk-user-executor',$this->tableName,'executor_id','{{%user}}','id','CASCADE');
        $this->addForeignKey('fk-status-ticket',$this->tableName,'status_id','{{%status_ticket}}','id','CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
