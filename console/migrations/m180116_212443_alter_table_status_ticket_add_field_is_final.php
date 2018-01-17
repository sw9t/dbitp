<?php

use yii\db\Migration;

class m180116_212443_alter_table_status_ticket_add_field_is_final extends Migration
{
    public $tableName = '{{%status_ticket}}';

    public function safeUp()
    {
        $this->addColumn($this->tableName, 'is_final', $this->integer()->notNull()->defaultValue(0));

    }

    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'is_final');
    }

}
