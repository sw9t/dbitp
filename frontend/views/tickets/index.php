<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('declarer')): ?>
        <p>
            <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'subject',
            'text:ntext',
//            ['label' => 'Статус',
//                'attribute' => 'status_id',
//                'content' => function ($model) {
//                    $a = StatusTicket::find()->where(['id' => $model->status_id])->one();
//                    if (empty($a->color)) {
//                        return '<span class="label label-info" style="background-color: black">' . $a->name . '</span>';
//                    } else {
//                        return '<span class="label label-info" style="background-color: ' . $color . '">' . $a->name . '</span>';
//                    }
//                },
//            ],
            ['attribute'=>'declarer_id'],
            ['attribute'=>'executor_id'],
//            'created_at',
//            'updated_at',
            // 'is_deleted',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
