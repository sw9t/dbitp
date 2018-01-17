<?php

use yii\bootstrap\BaseHtml;
use yii\helpers\Html;
use yii\helpers\Url;
$userInfoModel=\frontend\models\UserInfo::find()->where(['id_user'=>$user->id])->one();
if(!empty($userInfoModel->photo)){
    $photo=Yii::$app->params['pathDownloads'] .$userInfoModel->photo;
}else{
    $photo=Yii::$app->params['pathDownloads'] . 'no-avatar.png';
}

?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="logo-box">
            <a href="/" class="logo-text"><span>Helpdesk</span></a>
        </div><!-- Logo Box -->
        <div class="search-button">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                        class="fa fa-search"></i></a>
        </div>
        <div class="topmenu-outer">
            <div class="top-menu">
                <ul class="nav navbar-nav navbar-left">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                           data-toggle="dropdown"><i class="fa fa-envelope"></i><span
                                    class="badge badge-success pull-right">4</span></a>
                        <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                            <li><p class="drop-title">You have 4 new messages !</p></li>
                            <li class="dropdown-menu-list slimscroll messages">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="msg-img">
                                                <div class="online on"></div>
                                                <img class="img-circle" src="/images/avatar2.png" alt=""></div>
                                            <p class="msg-name">Sandra Smith</p>
                                            <p class="msg-text">Hey ! I'm working on your project</p>
                                            <p class="msg-time">3 minutes ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img">
                                                <div class="online off"></div>
                                                <img class="img-circle" src="/images/avatar4.png" alt=""></div>
                                            <p class="msg-name">Amily Lee</p>
                                            <p class="msg-text">Hi David !</p>
                                            <p class="msg-time">8 minutes ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img">
                                                <div class="online off"></div>
                                                <img class="img-circle" src="/images/avatar3.png" alt=""></div>
                                            <p class="msg-name">Christopher Palmer</p>
                                            <p class="msg-text">See you soon !</p>
                                            <p class="msg-time">56 minutes ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img">
                                                <div class="online on"></div>
                                                <img class="img-circle" src="/images/avatar5.png" alt=""></div>
                                            <p class="msg-name">Nick Doe</p>
                                            <p class="msg-text">Nice to meet you</p>
                                            <p class="msg-time">2 hours ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img">
                                                <div class="online on"></div>
                                                <img class="img-circle" src="/images/avatar2.png" alt=""></div>
                                            <p class="msg-name">Sandra Smith</p>
                                            <p class="msg-text">Hey ! I'm working on your project</p>
                                            <p class="msg-time">5 hours ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img">
                                                <div class="online off"></div>
                                                <img class="img-circle" src="/images/avatar4.png" alt=""></div>
                                            <p class="msg-name">Amily Lee</p>
                                            <p class="msg-text">Hi David !</p>
                                            <p class="msg-time">9 hours ago</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="drop-all"><a href="#" class="text-center">All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                           data-toggle="dropdown"><i class="fa fa-bell"></i><span
                                    class="badge badge-success pull-right">3</span></a>
                        <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                            <li><p class="drop-title">You have 3 pending tasks !</p></li>
                            <li class="dropdown-menu-list slimscroll tasks">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                            <p class="task-details">New user registered.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                            <p class="task-details">Database error.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-info"><i class="icon-heart"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">1h ago</span>
                                            <p class="task-details">Reached 24k likes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                           data-toggle="dropdown">
                            <span class="user-name"><?=  $userInfoModel->first_name.' '.$userInfoModel->last_name ?>
                                <i class="fa fa-angle-down"></i></span>
                            <img class="img-circle avatar" src="<?=$photo?>" width="40" height="40" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-list" role="menu">
                            <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Профиль</a></li>
                            <li role="presentation"><a href="<?= Url::to(['/site/logout']) ?>" data-method="post">
                                    <i class="fa fa-sign-out m-r-xs"></i>
                                    Выход</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                            <i class="fa fa-comments"></i>
                        </a>
                    </li>
                </ul><!-- Nav -->
            </div><!-- Top Menu -->
        </div>
    </div>
</div>