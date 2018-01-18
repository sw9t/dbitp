<?php

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\JuiAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'Статусы заявок';
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    var text = 'статус заявок'
</script>
<div class="status-ticket-index">
    <div class="row">
        <div class="col-sm-6">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-sm-6">
                <?= Html::a('<i class = \'fa fa-plus\'></i>' . '  Добавить статус заявок', ['create'],
                    ['class' => 'btn btn-success btn-addon pull-right btn-modal',
                        'style' => 'margin-bottom: 7px;', 'data-action' => 'create']) ?>
        </div>
    </div>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['id' => 'order-table', 'class' => 'display table offers-table table-striped'],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
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
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 85px;'],
                'template' => '{update} {delete}',
                'header' => '',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            $url, [
                                'class' => 'btn btn-info btn-xs btn-rounded btn-modal',
                                'data-action' => 'update',
                            ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>',
                            $url, [
                                'class' => 'btn btn-danger btn-xs btn-rounded',
                                'data-confirm' => 'Вы уверены что хотите удалить этот статус?',
                                'data-method' => 'post',
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>