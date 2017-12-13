<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\StatusTicket */

$this->title = 'Создать статус заявки';
$this->params['breadcrumbs'][] = ['label' => 'Статус заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
