<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class TicketsComments extends ActiveRecord
{

    public static function tableName()
    {
        return 'tickets_comments';
    }

    public function rules()
    {
        return [
            [['ticket_id', 'declarer_id', 'is_deleted'], 'integer'],
            [['created_at'], 'safe'],
            [['text'], 'string', 'max' => 255],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tickets::className(), 'targetAttribute' => ['ticket_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'ticket_id' => 'Ticket ID',
            'declarer_id' => 'Declarer ID',
            'created_at' => 'Created At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getTicket()
    {
        return $this->hasOne(Tickets::className(), ['id' => 'ticket_id']);
    }
}
