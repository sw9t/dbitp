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
            <?= $form->field($modelUserInfo, 'last_name') ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($modelUserInfo, 'first_name') ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($modelUserInfo, 'date_of_birth')->textInput(['class' => 'form-control', 'id' => 'datetimepicker'])  ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($modelUserInfo, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+373 (999) 99-999',
            ]) ?>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <div align="center">
                    <div class="img-block" style="width: 50%;position: relative;">
                        <?php if ($modelUserInfo->photo): ?>
                            <img class="user-avatar-image"
                                 src="<?= Yii::$app->params['pathDownloads'] . $modelUserInfo->photo ?>"
                                 style="border: 1px solid #1a1a1a;width: 100%; height: auto;"/>
                        <?php else: ?>
                            <img class="user-avatar-image" src="<?= Yii::$app->params['pathDownloads'] . 'no-profile.png' ?>"
                                 style="border: 1px solid #1a1a1a;width: 100%; height: auto;"/>
                        <?php endif; ?>
                        <div class="glyphicon glyphicon-pencil qwe-pencil"
                             style="position:absolute; top: 5px;right: 5px; font-size: x-large;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12" hidden>
            <?= $form->field($modelUserInfo, 'img')->fileInput() ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($modelAuthAssigment, 'item_name')->radioList($modelRoles) ?>
        </div>
        <div class="col-sm-12 form-group">
            <?= Html::submitButton($status == 1 ? 'Создать пользователя' : 'Сохранить изменения', ['class' => 'btn btn-block btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>
    $("#datetimepicker").datepicker({
        format: 'Y-M-D',
        inline: true
    });
    $('.user-avatar-image').click(function () {
        $('#userinfo-img').click();
    });
    $('.qwe-pencil').click(function () {
        $('#userinfo-img').click();
    });
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.user-avatar-image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userinfo-img").change(function () {
        readURL(this);
    });
</script>