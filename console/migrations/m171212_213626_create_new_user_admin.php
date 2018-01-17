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
    public function safeUp()
    {
        $user = new User([
            'username' => 'admin',
            'email' => 'oksana@oksana.oksana',
        ]);
        RbacController::actionInit();
        $user->setPassword('123456');
        $user->generateAuthKey();

        if($user->save()) {
            echo "User Oksana created\n";
        } else {
            echo "Error\n";
            print_r($user->getErrors());
        }
    }

    public function safeDown()
    {
        User::deleteAll(['id'=>1]);
    }
}
