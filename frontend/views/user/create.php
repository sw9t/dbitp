<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;

$this->title = 'Создание пользователя';
?>

<div class="col-lg-6 col-lg-offset-3" style="padding: 50px;  padding-top: 1px;  padding-bottom: 20px;  background-color: #f1f1f2;">
    <div class="users-create">
        <h1 style="text-align: center;"><span class="project-text"><?= $this->title ?></span></h1>
        <?= $this->render('_form', [
            'model' => $model,
            'modelAuthAssigment' => $modelAuthAssigment,
            'status'=>1,
            'modelRoles'=>$modelRoles,
        ]) ?>
    </div>
</div>