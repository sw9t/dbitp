<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tickets */

$this->title = $model->isNewRecord ? 'Подать заявку' : 'Редактировать заявку #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickets-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
