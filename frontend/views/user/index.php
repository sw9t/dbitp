<?php

use frontend\models\AuthAssignment;
use frontend\models\AuthItem;
use frontend\models\UserInfo;
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
            <?= Html::a('<i class = \'fa fa-plus\'></i>' . '  Создать пользователя', ['create'],
                ['class' => 'btn btn-success btn-addon pull-right btn-modal',
                    'data-action' => 'create', 'data-modalclass' => 'modal-lg',
                ]) ?>
        </div>
    </div>
    <?php $columns = []; ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['id' => 'order-table', 'class' => 'display table offers-table table-striped'],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 80px;text-align:center;'],
            ],
            [
                'label' => '',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width: 80px;text-align:center;'],
                'value' => function ($model) {
                    $image = UserInfo::find()->where(['id_user' => $model->id])->one();
                    if (!empty($image)) {
                        return Html::img(Yii::$app->params['pathDownloads'] . $image->photo, [
                            'alt' => 'картинка в gridview',
                            'style' => 'width:30px;height: 30px;', 'class' => 'imageintable myImgPopUp',
                        ]);
                    } else {
                        return Html::img(Yii::$app->params['pathDownloads'] . 'no-avatar.png', [
                            'alt' => 'yii2 - картинка в gridview',
                            'style' => 'width:30px;height: 30px;',

                        ]);
                    }
                },
            ],
            [
                'attribute' => 'username',
            ],
            [
                'attribute' => 'email',
                'content' => function ($model) {
                    return !empty($model->email) ? Html::a($model->email, 'mailto:' . $model->email, ['target' => '_blank']) : '-';
                }
            ],
            [
                'label' => 'Полное имя',
                'content' => function ($model) {
                    $userInfo = UserInfo::find()->where(['id_user' => $model->id])->one();
                    return $userInfo->first_name . ' ' . $userInfo->last_name;
                }
            ],
            [
                'label' => 'Роль',
                'content' => function ($model) {
                    $authAssigment = AuthAssignment::find()->where(['user_id' => $model->id])->one();
                    $role = AuthItem::find()->where(['name' => $authAssigment->item_name])->one();
                    return $role->description;
                }
            ],
            [
                'label' => 'Дата рождения',
                'content' => function ($model) {
                    $userInfo = UserInfo::find()->where(['id_user' => $model->id])->one();
                    return !empty($userInfo->date_of_birth) ? $userInfo->date_of_birth : '-';
                }
            ],
            [
                'label' => 'Номер тел.',
                'content' => function ($model) {
                    $userInfo = UserInfo::find()->where(['id_user' => $model->id])->one();
                    return !empty($userInfo->phone_number) ? Html::a($userInfo->phone_number, 'tel:' . $userInfo->phone_number) : '-';
                }
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
                                'data-modalclass' => 'modal-lg',
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
