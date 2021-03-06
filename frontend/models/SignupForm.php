<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;


class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeat_password;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['repeat_password'], 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
        ];
    }

    public function signup($fromAdmin = false)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if ($user->save()) {
            if (!$fromAdmin) {
                $authAssigment = new AuthAssignment();
                $authAssigment->item_name = 'declarer';
                $authAssigment->user_id = (string)$user->id;
                $authAssigment->created_at = time();
                $authAssigment->save();
            }
        }
        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'repeat_password' => 'Повторить пароль',
        ];
    }

}
