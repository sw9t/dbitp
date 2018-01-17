<?php

use yii\db\Migration;

class m171212_224723_create_new_table_status_list extends Migration
{

    public $tableName = '{{%status_ticket}}';

    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'color' => $this->string(),
            'is_final' => $this->integer()->notNull()->defaultValue(0),
            'is_deleted' => $this->integer()->notNull()->defaultValue(0)
        ]);
        $this->batchInsert($this->tableName, ['name', 'color'], [
            ['Создана', '#bbbbbb'],
            ['В процессе обработки', '#ffff00'],
            ['Завершена', '#00ff00'],
            ['Отклонена', '#ff0000'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

}
