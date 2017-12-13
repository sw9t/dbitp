<?php

use frontend\models\AuthAssignment;
use frontend\models\AuthItem;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\runtime\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php


    $columns=[

    ];?>


    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
                'template' => '{make-user-executor}',
                'header' => 'Изменить роль.',
                'buttons' => [
                    'make-user-executor' => function ($url, $model) {
                        $authAssigment = AuthAssignment::find()->where(['user_id' => $model->id])->one();
                        if($authAssigment->item_name=='admin'){
                            return Html::a('<span class="btn btn-default btn-xs btn-rounded"><span class="glyphicon-pencil"></span> </span>',
                                '#', [
                                        'disabled'=>'disabled',
                                ]);
                        }
                        if($authAssigment->item_name=='declarer'){
                            return Html::a('<span class="btn btn-success btn-xs btn-rounded"><span class="glyphicon-arrow-up"></span> </span>',
                                $url, [
                                ]);
                        }
                        if($authAssigment->item_name=='executor'){
                            return Html::a('<span class="btn btn-danger btn-xs btn-rounded"><span class="glyphicon-arrow-down"></span> </span>',
                                $url, [
                                ]);
                        }

                    },
                ],
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width : 25px;'],
                'template' => '{delete}',
                'header' => 'Уд.',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="btn btn-success btn-xs btn-rounded "><i class = "fa fa-level-up"></i></span>',
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
