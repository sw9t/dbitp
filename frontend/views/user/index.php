<?php

use frontend\models\AuthAssignment;
use frontend\models\AuthItem;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="row">
        <div class="col-lg-6" style="font-weight: bold;    font-size: xx-large;">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="col-lg-6" style="direction: rtl;">
            <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php


    $columns = [

    ]; ?>


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
                'contentOptions' => ['style' => 'width : 25px;'],
                'template' => '{update}',
                'header' => '',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="btn btn-info btn-xs btn-rounded ">Редактировать</span>',
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
                        return Html::a('<span class="btn btn-danger btn-xs btn-rounded ">Удалить</span>',
                            $url, [
                                'data-confirm' => 'Вы уверены что хотите удалить пользователя?',
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
