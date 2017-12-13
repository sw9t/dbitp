<?php

use yii\db\Migration;

/**
 * Class m171212_235123_edit_column_is_deleted_tickets
 */
class m171212_235123_edit_column_is_deleted_tickets extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('{{%tickets}}', 'is_deleted', $this->integer()->defaultValue(0));
        $this->alterColumn('{{%status_ticket}}', 'is_deleted', $this->integer()->defaultValue(0));
    }

    public function safeDown()
    {
        $this->alterColumn('{{%tickets}}', 'is_deleted', $this->integer());
        $this->alterColumn('{{%status_ticket}}', 'is_deleted', $this->integer());
    }
}
