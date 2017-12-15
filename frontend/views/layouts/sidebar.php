<?php

use yii\helpers\Url;

?>
<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <div class="sidebar-header">
            <div class="sidebar-profile">
                <a href="javascript:void(0);" id="profile-menu-link">
                    <div class="sidebar-profile-image">
                        <img src="/images/profile-menu-image.png" class="img-circle img-responsive" alt="">
                    </div>
                    <div class="sidebar-profile-details">
                        <span><?=

                            Yii::$app->user->identity->username ?><br>
                            <small><?= Yii::$app->user->identity->email ?></small></span>
                    </div>
                </a>
            </div>
        </div>
        <ul class="menu accordion-menu">
            <li class="droplink active"><a href="<?= Url::to(['/tickets/index']) ?>"
                                                class="waves-effect waves-button">
                    <span class="menu-icon glyphicon glyphicon-list-alt"></span>
                    <p>Заявки</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?= Url::to(['/tickets/index']) ?>">Мои заявки</a></li>
                    <li class="active"><a href="<?= Url::to(['/tickets/index']) ?>">В обработке</a></li>
                    <li><a href="<?= Url::to(['/tickets/index']) ?>">Свободные заявки</a></li>
                </ul>
            </li>
            <li class="droplink"><a href="#" class="waves-effect waves-button">
                    <span class="menu-icon glyphicon glyphicon-user"></span>
                    <p>Пользователи</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?= Url::to(['/user']) ?>">Управление пользователями</a></li>
                    <li><a href="<?= Url::to(['/user/create']) ?>">Создать новый аккаунт</a></li>
                </ul>
            </li>

            <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                            class="menu-icon glyphicon glyphicon-th"></span>
                    <p>Справочники</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?= Url::to(['/status-tickets']) ?>">Статусы заявок</a></li>

                </ul>
            </li>

            <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                            class="menu-icon glyphicon glyphicon-flash"></span>
                    <p>Levels</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li class="droplink"><a href="#"><p>Level 1.1</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li class="droplink"><a href="#"><p>Level 2.1</p><span class="arrow"></span></a>
                                <ul class="sub-menu">
                                    <li><a href="#">Level 3.1</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Level 2.2</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Level 1.2</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->
