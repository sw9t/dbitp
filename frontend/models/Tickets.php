<?php

namespace frontend\models;

use common\models\User;
use yii\db\ActiveRecord;

class Tickets extends ActiveRecord
{
    public static function tableName()
    {
        return 'tickets';
    }

    public function rules()
    {
        return [
            [['text'], 'string'],
            [['status_id', 'declarer_id', 'executor_id', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['subject'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusTicket::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['declarer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['declarer_id' => 'id']],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['executor_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'text' => 'Text',
            'status_id' => 'Status ID',
            'declarer_id' => 'Declarer ID',
            'executor_id' => 'Executor ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    public function getStatus()
    {
        return $this->hasOne(StatusTicket::className(), ['id' => 'status_id']);
    }

    public function getDeclarer()
    {
        return $this->hasOne(User::className(), ['id' => 'declarer_id']);
    }

    public function getExecutor()
    {
        return $this->hasOne(User::className(), ['id' => 'executor_id']);
    }

    public function getTicketsComments()
    {
        return $this->hasMany(TicketsComments::className(), ['ticket_id' => 'id']);
    }
}
