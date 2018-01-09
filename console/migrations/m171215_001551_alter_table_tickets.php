<?php

use yii\db\Migration;

/**
 * Class m171215_001551_alter_table_tickets
 */
class m171215_001551_alter_table_tickets extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%tickets}}', 'is_closed', $this->integer()->defaultValue(0));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%tickets}}', 'is_closed');
    }
}
