<?php

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\Controller;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this \yii\web\View */
//$this->registerJsFile('@web/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
//    ['position' => View::POS_END, 'depends' => [BootstrapPluginAsset::className(), JqueryAsset::className()]]);
?>
<div class="users-form">
    <?php $form = ActiveForm::begin(['id' => 'form-users']); ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="img-block" style="position: relative;">
                <?php if ($modelUserInfo->photo): ?>
                    <img class="img-circle user-avatar-image"
                         src="<?= Yii::$app->params['pathDownloads'] . $modelUserInfo->photo ?>"
                         style="border: 1px solid #1a1a1a;width: 100%; height: auto;"/>
                <?php else: ?>
                    <img class="img-circle user-avatar-image"
                         src="<?= Yii::$app->params['pathDownloads'] . 'no-avatar.png' ?>"
                         style="border: 1px solid #1a1a1a;width: 100%; height: auto;"/>
                <?php endif; ?>
                <div class="glyphicon glyphicon-pencil qwe-pencil"
                     style="position:absolute; top: 5px;right: 5px; font-size: x-large;"></div>
            </div>
            <div hidden>
                <?= $form->field($modelUserInfo, 'img')->fileInput() ?>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($modelUserInfo, 'first_name') ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($modelUserInfo, 'last_name') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($modelUserInfo, 'date_of_birth')->textInput(['class' => 'form-control', 'id' => 'datetimepicker']) ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($modelUserInfo, 'phone_number')->widget(MaskedInput::className(), [
                        'mask' => '+373 (999) 99-999',
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'username')->textInput() ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>
                </div>
            </div>
            <?php if ($status == 1): ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'repeat_password')->passwordInput() ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <?= $form->field($modelAuthAssigment, 'item_name')->radioList($modelRoles) ?>
        </div>
    </div>
    <div class="row">
        <br/>
        <div class="col-sm-12 form-group">
            <?= Html::submitButton($status == 1 ? 'Создать пользователя' : 'Сохранить изменения',
                ['class' => 'btn btn-block btn-success', 'name' => 'signup-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    $('#datetimepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'ru',
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