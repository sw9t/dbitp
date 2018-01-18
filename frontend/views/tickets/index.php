<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs(<<<JS

JS
    , \yii\web\View::POS_END);
?>
<script>
    var text = 'заявку'
</script>
<div class="tickets-index">
    <div class="row">
        <div class="col-sm-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-sm-4">
            <?php if (Yii::$app->user->can('declarer')): ?>
                <?= Html::a('<i class = \'fa fa-plus\'></i>' . '  Создать заявку',
                    ['create'],
                    ['class' => 'btn btn-success btn-addon pull-right btn-modal',
                        'style' => 'margin-bottom: 7px;', 'data-action' => 'create']) ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 btn-group-justified">
            <?php if (Yii::$app->user->can('declarer')): ?>
                <a class="btn btn-type-action <?= $type == 'my' ? 'btn-primary' : 'btn-default' ?>" href="/?type=my">Мои
                    заявки</a>
            <?php endif; ?>
            <?php if (Yii::$app->user->can('executor')): ?>
                <a class="btn btn-type-action <?= $type == 'free' ? 'btn-primary' : 'btn-default' ?>"
                   href="/?type=free">Свободные
                    заявки</a>
                <a class="btn btn-type-action <?= $type == 'processing' ? 'btn-primary' : 'btn-default' ?>"
                   href="/?type=processing">На
                    исполнении</a>
            <?php endif; ?>
            <a class="btn btn-type-action <?= $type == 'completed' ? 'btn-primary' : 'btn-default' ?>"
               href="/?type=completed">Закрытые заявки</a>
        </div>
    </div>
    <br>
    <?php Pjax::begin(['id' => 'tickets-pjax']); ?>

    <?php foreach ($dataProvider->getModels() as $model): ?>
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title"><?= !empty($model->subject) ? $model->subject : "(без заголовка)" ?></h3>
                <div class="panel-control">
                    <span>#<?= $model->id ?></span>
                </div>
            </div>
            <hr style="margin: 0">
            <div class="panel-body">
                <p><?= !empty($model->text) ? $model->text : "Текст заявки отсутствует." ?></p>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="pull-left">
                            <strong>Зявитель: </strong>
                            <span><?= !empty($model->declarer_id) ? $model->getDeclarer()->one()->username : "неизвестен" ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <strong>Исполнитель: </strong>
                            <span><?= !empty($model->executor_id) ? $model->getExecutor()->one()->username : "не назначен" ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="pull-left">
                            <strong>Статус: </strong>
                            <?php
                            $status = $model->getStatusTicket()->one();
                            ?>
                            <i class="fa fa-circle" style="color:<?= $status->color ?>; font-size: 15px"></i>
                            <span><?= $status->name ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <strong>Создана: </strong>
                            <span><?= $model->created_at ?></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <div class="pull-left">
                            <strong><?= $status->is_final ? 'Заявка закрыта:' : 'Последнее изменение:' ?></strong>
                            <span><?= $model->updated_at ?></span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="pull-right">
                            <?php if (Yii::$app->user->can('executor') && !$status->is_final && $model->executor_id == null): ?>
                                <a href="/tickets/execute-ticket?id=<?= $model->id ?>"
                                   class="btn execute-ajax btn-xs btn-success btn-addon"><i class="fa fa-edit"></i>
                                    Исполнять</a>
                            <?php endif; ?>
                            <?php if (Yii::$app->user->can('executor') &&
                                (Yii::$app->user->id == $model->executor_id || Yii::$app->user->can('admin')) && !$status->is_final
                            ): ?>
                                <a href="/tickets/update?id=<?= $model->id ?>"
                                   class="btn btn-xs btn-modal btn-info btn-addon"><i class="fa fa-edit"></i>
                                    Редактировать</a>
                            <?php endif; ?>
                            <?php if ((Yii::$app->user->can('admin') ||
                                    Yii::$app->user->id == $model->declarer_id) && !$status->is_final
                            ): ?>
                                <a href="/tickets/delete?id=<?= $model->id ?>"
                                   class="btn btn-xs delete-ajax btn-danger btn-addon"><i class="fa fa-trash"></i>
                                    Удалить</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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
