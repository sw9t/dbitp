<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\runtime\StatusTicketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
                    if (empty($model->color)) {
                        return '<span class="label label-info" style="background-color: black;font-size: initial;">' . $model->color . '</span>';
                    } else {
                        return '<span class="label label-info" style="background-color: ' . $model->color . ';font-size: initial;">' . $model->color . '</span>';
                    }

                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
