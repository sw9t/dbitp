<?php

use common\models\User;
use console\controllers\RbacController;
use yii\db\Migration;

/**
 * Class m171212_213626_create_new_user_admin
 */
class m171212_213626_create_new_user_admin extends Migration
{
    /**
     * @inheritdoc
     */
    public $tableName1='{{%user_info}}';

    public function safeUp()
    {
        $user = new User([
            'username' => 'admin',
            'email' => 'oksana@oksana.oksana',
        ]);
        RbacController::actionInit();
        $user->setPassword('123456');
        $user->generateAuthKey();

        $this->createTable($this->tableName1, [
            'id' => $this->primaryKey(),
            'id_user'=>$this->integer(),
            'last_name' => $this->string()->notNull(),
            'first_name'=>$this->string()->notNull(),
            'date_of_birth'=>$this->date()->notNull()->defaultValue('2018-01-17 17:10:05'),
            'photo'=>$this->text(),
            'phone_number'=>$this->string(),
        ]);
        $this->addForeignKey('fk-user-user_info',$this->tableName1,'id_user','{{%user}}','id','CASCADE');
        $userinfoModel=new \frontend\models\UserInfo();
        $userinfoModel->id_user=1;
        $userinfoModel->last_name='Макдак';
        $userinfoModel->first_name='Оксана';
        $userinfoModel->date_of_birth='2018-01-17';
        $userinfoModel->photo='no-avatar.png';
        $userinfoModel->phone_number='+373 (777) 77-777';

        if($user->save() && $userinfoModel->save()) {
            echo "User Oksana created\n";
        } else {
            echo "Error\n";
            print_r($user->getErrors());
        }


    }

    public function safeDown()
    {
        User::deleteAll(['id'=>1]);
        $this->dropTable($this->tableName1);

    }
}
