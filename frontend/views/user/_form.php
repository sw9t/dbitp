<?php

use yii\web\Controller;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \backend\models\RoleList;
use \backend\models\UploadImage;
use \backend\models\Role;

?>
<div class="users-form">
    <?php $form = ActiveForm::begin(['id' => 'form-users']); ?>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'email') ?>
        </div>
        <?php if ($status == 1): ?>
            <div class="col-sm-12">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
        <?php endif; ?>
        <div class="col-sm-12">
            <?= $form->field($modelAuthAssigment, 'item_name')->radioList($modelRoles) ?>
        </div>
        <div class="col-sm-12 form-group">
            <?= Html::submitButton($status == 1 ? 'Создать пользователя' : 'Сохранить изменения', ['class' => 'btn btn-block btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
