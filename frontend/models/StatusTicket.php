<?php

namespace frontend\models;



use yii\db\ActiveRecord;

class StatusTicket extends ActiveRecord
{
    public static function tableName()
    {
        return 'status_ticket';
    }

    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
            [['name', 'color'], 'string', 'max' => 255],
        ];
    }

   public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Статус',
            'color' => 'Цвет',
            'is_deleted' => 'Удален',
        ];
    }

    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['status_id' => 'id']);
    }
}
