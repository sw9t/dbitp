<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;


class UserInfo extends ActiveRecord
{

    public $img;

    public static function tableName()
    {
        return 'user_info';
    }

    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['last_name', 'first_name'], 'required'],
            [['date_of_birth'], 'safe'],
            [['photo'], 'string'],
            [['img'], 'file', 'extensions' => 'png, jpg'],
            [['last_name', 'first_name', 'phone_number'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'date_of_birth' => 'Дата рождения',
            'photo' => 'Photo',
            'phone_number' => 'Телефонный номер',
        ];
    }

    public function createUsersInfo($id)
    {
        $this->id = $id;
        $this->img = UploadedFile::getInstance($this, 'img');
        if ($this->img) {
            if ($this->validate()) {
                $path = \Yii::$app->params['pathUploads'];
                $this->photo = md5($id) . '.' . $this->img->extension;
                $this->img->saveAs($path . $this->photo);
                $this->img = null;
            }
        }
        if (!$this->validate()) {
            return null;
        }
        return $this->save() ? $this : null;
    }
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
