<?php

use yii\helpers\Url;

$userInfoModel=\frontend\models\UserInfo::find()->where(['id_user'=>$user->id])->one();
if(!empty($userInfoModel->photo)){
    $photo=Yii::$app->params['pathDownloads'] .$userInfoModel->photo;
}else{
    $photo=Yii::$app->params['pathDownloads'] . 'no-profile.png';
}

?>
<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <div class="sidebar-header">
            <div class="sidebar-profile">
                <a href="#" id="profile-menu-link">
                    <div class="sidebar-profile-image">
                        <img src="<?=$photo?>" class="img-circle img-responsive" alt="">
                    </div>
                    <div class="sidebar-profile-details">
                        <span><?= $userInfoModel->first_name ?><br>
                            <small><?= $userInfoModel->last_name ?></small></span>
                    </div>
                </a>
            </div>
        </div>
        <ul class="menu accordion-menu">
            <li class="<?=$_SERVER['REQUEST_URI']=='/tickets/index' ? 'active' : ''?>"><a href="<?= Url::to(['/tickets/index']) ?>">Мои заявки</a></li>
            <li class="<?=$_SERVER['REQUEST_URI']=='/tickets/index' ? 'active' : ''?>"><a href="<?= Url::to(['/tickets/index']) ?>">В обработке</a></li>
            <li class=""><a href="<?= Url::to(['/tickets/index']) ?>">Свободные заявки</a></li>
            <li class="droplink"><a href="#" class="waves-effect waves-button">
                    <span class="menu-icon glyphicon glyphicon-user"></span>
                    <p>Пользователи</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?= Url::to(['/user']) ?>">Управление пользователями</a></li>
                    <li><a href="<?= Url::to(['/user/create']) ?>" class="btn-modal" data-action="create">
                            Создать новый аккаунт</a>
                    </li>
                </ul>
            </li>

            <li class="droplink"><a href="#" class="waves-effect waves-button"><span
                            class="menu-icon glyphicon glyphicon-th"></span>
                    <p>Справочники</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?= Url::to(['/status-tickets']) ?>">Статусы заявок</a></li>

                </ul>
            </li>
        </ul>
    </div><!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->
