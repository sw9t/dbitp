<?php

use frontend\models\StatusTicket;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->radioList(ArrayHelper::map(StatusTicket::find()->where(['is_deleted' => 0])
        ->all(), 'id', 'name'), [
        'item' => function ($index, $label, $name, $checked, $value) {
            $checkbox = Html::radio($name, $checked, ['class' => 'checkbox-button-item', 'value' => $value, 'disabled' => false]);
            return Html::tag('div', Html::label($checkbox . Yii::t('app', $label), [],
                ['class' => 'checkbox-roles-item']),
                ['class' => 'col-xs-12 checkbox', 'style' => 'margin-top:10px !important;']);
        }
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Подать заявку' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
