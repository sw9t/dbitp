<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\StatusTicket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-ticket-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-10">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'color', ['template' => "{label}<br>{input}"])
                ->input('color', ['class' => "form-control",]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
