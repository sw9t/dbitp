<?php

use frontend\models\StatusTicket;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$statuses = ArrayHelper::map(StatusTicket::find()->where(['is_deleted' => 0])->all(), 'id', 'name',
    function ($model) {
        return $model->is_final ? 'Финальные (Заявка будет закрыта)' : 'Рабочие';
    }
);
?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->dropDownList($statuses) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Подать заявку' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
