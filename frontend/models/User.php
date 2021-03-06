<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class User extends \common\models\User
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Адрес эл. почты',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['declarer_id' => 'id']);
    }

    public function getTickets0()
    {
        return $this->hasMany(Tickets::className(), ['executor_id' => 'id']);
    }

    public function getUserInfo()
    {
        return $this->hasMany(UserInfo::className(), ['id_user' => 'id']);
    }
}
