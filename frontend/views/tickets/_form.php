<?php

use frontend\models\StatusTicket;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$statuses = ArrayHelper::map(StatusTicket::find()->where(['is_deleted' => 0])->all(), 'id', 'name');
?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->radioList($statuses) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Подать заявку' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
