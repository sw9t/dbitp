<?php

use yii\web\Controller;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \backend\models\RoleList;
use \backend\models\UploadImage;
use \backend\models\Role;

?>
<div class="users-form">

    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-users']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?php if($status==1):?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        <?php endif;?>

        <?= $form->field($modelAuthAssigment,'item_name')->radioList($modelRoles)?>

        <div class="form-group">
            <?= Html::submitButton($status==1 ? 'Создать пользователя' : 'Сохранить изменения', ['class' => 'btn btn-block btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
