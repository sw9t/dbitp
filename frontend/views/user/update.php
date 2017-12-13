<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;

$this->title = 'Редактирование пользователя';

?>
<div class="col-lg-4 col-lg-offset-4" style="padding: 50px; padding-top: 1px; padding-bottom: 20px; background-color: #f1f1f2;">
    <div class="users-update">
        <h1 style="text-align: center;"><span class="project-text"><?= $this->title ?></span></h1>
        <?= $this->render('_form', [
            'model' => $model,
            'modelAuthAssigment' => $modelAuthAssigment,
            'status'=>0,
            'modelRoles'=>$modelRoles,
        ]) ?>
    </div>
</div>