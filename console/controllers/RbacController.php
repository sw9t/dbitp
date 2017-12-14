<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\rbac\DbManager;


class RbacController extends Controller
{
    public function actionInit()
    {
        Yii::$app->cache->flush();
        $auth = Yii::$app->authManager;
        $auth->removeAll();


        $admin = Yii::$app->authManager->createRole('admin');
        $admin->description = "Администратор";
        Yii::$app->authManager->add($admin);

        $declarer = Yii::$app->authManager->createRole('declarer');
        $declarer->description = "Заявитель";
        Yii::$app->authManager->add($declarer);

        $executor = Yii::$app->authManager->createRole('executor');
        $executor->description = "Исполнитель";
        Yii::$app->authManager->add($executor);

        Yii::$app->authManager->addChild($admin, $executor);
        Yii::$app->authManager->addChild($admin, $declarer);

        $userRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($userRole, 1);
    }
}
