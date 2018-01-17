<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

/* @var $modelUserInfo \frontend\models\UserInfo */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs(<<<JS
    $('#datetimepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'ru',
    });
JS
    , \yii\web\View::POS_END);
?>
<div class="col-md-6 center">
    <div class="site-signup">
        <!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
        <p class="text-center">Для регистрации необходимо заполнить все поля ниже.</p>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
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
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'repeat_password')->passwordInput() ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Создать аккаунт', ['class' => 'btn btn-success btn-block', 'name' => 'signup-button']) ?>
            <?= Html::a('Перейти на страницу входа', ['site/login'], ['class' => 'btn btn-info btn-block']) ?>
        </div>
    </div>
    <div class="form-group">
    </div>
    <?php ActiveForm::end(); ?>
</div>
