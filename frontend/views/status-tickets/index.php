<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Статусы заявок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать статус заявки', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                'label' => 'Цвет',
                'attribute' => 'color',
                'content' => function ($model) {
                    return empty($model->color) ? '<span class="label label-info" style="background-color: black;">' . $model->color . '</span>'
                        : '<span class="label label-info" style="background-color: ' . $model->color . ';">' . $model->color . '</span>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
