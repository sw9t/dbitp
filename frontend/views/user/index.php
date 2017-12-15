<?php

use frontend\models\AuthAssignment;
use frontend\models\AuthItem;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    var text = 'пользователя'
</script>
<div class="user-index">
    <div class="row">
        <div class="col-sm-6">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-sm-6">
            <br>
            <br>
            <?= Html::a('Создать пользователя', ['create'],
                ['class' => 'btn btn-success pull-right btn-modal',
                    'data-action' => 'create',
                ]) ?>
        </div>
    </div>
    <?php $columns = []; ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            [
                'label' => 'Роль',
                'content' => function ($model) {
                    $authAssigment = AuthAssignment::find()->where(['user_id' => $model->id])->one();
                    $role = AuthItem::find()->where(['name' => $authAssigment->item_name])->one();
                    return $role->description;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 50px;'],
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
                                'data-confirm' => "Следующее действие удалит пользователя из базы.\n" .
                                    "Это действие необратимо!\n" . "Продолжить?",
                                'data-method' => 'post',
                            ]);
                    },
                ],
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
