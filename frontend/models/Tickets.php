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
            [['subject'], 'string', 'max' => 255],
            [['subject', 'text'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status_id'], 'exist', 'skipOnError' => true,
                'targetClass' => StatusTicket::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['declarer_id'], 'exist', 'skipOnError' => true,
                'targetClass' => User::className(), 'targetAttribute' => ['declarer_id' => 'id']],
            [['executor_id'], 'exist', 'skipOnError' => true,
                'targetClass' => User::className(), 'targetAttribute' => ['executor_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Тема',
            'text' => 'Содержание',
            'status_id' => 'Статус',
            'declarer_id' => 'Заявитель',
            'executor_id' => 'Исполнитель',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'is_deleted' => 'Удален',
        ];
    }

    public function getStatusTicket()
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
