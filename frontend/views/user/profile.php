<?php

use yii\helpers\Html;

$this->title = 'Профиль пользователя: ' . $user->username;
?>
<script>
    var text = 'профиль пользователя'
</script>
<div class="user-profile-page">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-photo">
                <img src="<?= Yii::$app->params['pathDownloads'] . $userInfo->photo ?>"
                     style="width: 100%">
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-unstyled">
                        <li>
                            <p>
                                <i class="fa fa-user"></i>
                                <strong> ID пользователя в системе: </strong> <?= $user->id ?>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-user"></i>
                                <strong> Дата рождения: </strong> <?= $userInfo->date_of_birth ?>
                            </p>
                        </li>
                        <li>
                            <p>
                                <i class="fa fa-user"></i>
                                <strong> Номер телефона: </strong> <?= $userInfo->phone_number ?>
                            </p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-8">

            <div class="row">
                <div class="col-sm-12">
                    <h1><?= Html::encode($userInfo->first_name . ' ' . $userInfo->last_name) ?></h1>
                    <h4><?= Html::encode($user->email) ?></h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a class="btn btn-primary btn-block btn-modal" href="/user/update?id=1"
                       data-action="update" data-modalclass="modal-lg">
                        <i class="fa fa-user m-r-xs"></i>Редактировать
                    </a>

                </div>
                <div class="col-sm-4">
                    <a class="btn btn-primary btn-block">
                        <i class="fa fa-lock m-r-xs"></i>Изменить пароль
                    </a>
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-primary btn-block" href="/site/logout" data-method="POST">
                        <i class="fa fa-sign-out m-r-xs"></i>Выйти из системы
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table">
                        <caption class="text-center">Краткая статистика</caption>
                        <tbody>
                        <tr>
                            <th scope="row">Мною создано заявок:</th>
                            <td><span class="pull-right">9000+</span></td>
                        </tr>
                        <tr>
                            <th scope="row">Моих заявок в ожидании:</th>
                            <td><span class="pull-right">900+</span></td>
                        </tr>
                        <tr>
                            <th scope="row">Моих заявок в обработке:</th>
                            <td><span class="pull-right">100</span></td>
                        </tr>
                        <tr>
                            <th scope="row">Моих заявок закрыто:</th>
                            <td><span class="pull-right">3000</span></td>
                        </tr>
                        <tr>
                            <th scope="row">Мною обработано заявок:</th>
                            <td><span class="pull-right">0</span></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td><span class="pull-right"></span></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td><span class="pull-right"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
