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
        <?= Html::a('<i class = \'fa fa-plus\'></i>' . '  Создать заявку',
            ['create'],
            ['class' => 'btn btn-success btn-addon btn-modal', 'style' => 'margin-bottom: 7px;']) ?>
    <?php endif; ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-bordered table-hover dataTable'
        ],
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
            ['attribute' => 'declarer_id'],
            ['attribute' => 'executor_id'],
//            'created_at',
//            'updated_at',
            // 'is_deleted',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width : 25px;'],
                'template' => '{update}',
                'header' => '',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="btn btn-info btn-xs btn-rounded "><i class="glyphicon glyphicon-pencil"></span>',
                            $url, [
                            ]);
                    },
                ],
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width : 25px;'],
                'template' => '{delete}',
                'header' => '',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="btn btn-danger btn-xs btn-rounded "><i class="glyphicon glyphicon-remove"></span>',
                            $url, [
                                'data-confirm' => 'Вы уверены что хотите удалить эту заявку?',
                                'data-method' => 'post',
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<script>
    $('.modalka').click(function (e) {
        e.preventDefault();
        $('#pModal').modal('show')
            .find('.modal-body')
            .load($(this).attr('href'));
    });
</script>
