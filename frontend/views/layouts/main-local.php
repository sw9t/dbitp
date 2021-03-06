<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;

Yii::$app->name = 'Helpdesk';
$user = !empty(Yii::$app->user->identity) ? Yii::$app->user->identity : new \common\models\User();
if ($user->isNewRecord) {
    $user->username = 'Guest';
    $user->email = '(no email)';
}
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?php echo Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Steelcoders"/>

    <!-- Styles -->

    <!--    <script src="/plugins/3d-bold-navigation/js/modernizr.js"></script>-->
    <!--    <script src="/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>-->
    <script>
        var text = '';
    </script>
</head>

<body class="page-header-fixed page-sidebar-fixed">
<?php $this->beginBody() ?>
<div class="overlay"></div>


<!--<div class="menu-wrap">-->
<!--    <nav class="profile-menu">-->
<!--        <div class="profile"><img src="/images/profile-menu-image.png" width="60"-->
<!--                                  alt="David Green"/><span>David Green</span>-->
<!--        </div>-->
<!--        <div class="profile-menu-list">-->
<!--            <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>-->
<!--            <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>-->
<!--            <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>-->
<!--            <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>-->
<!--        </div>-->
<!--    </nav>-->
<!--    <button class="close-button" id="close-button">Close Menu</button>-->
<!--</div>-->
<!--<form class="search-form" action="#" method="GET">-->
<!--    <div class="input-group">-->
<!--        <input type="text" name="search" class="form-control search-input" placeholder="Search...">-->
<!--        <span class="input-group-btn">-->
<!--                    <button class="btn btn-default close-search waves-effect waves-button waves-classic"-->
<!--                            type="button"><i class="fa fa-times"></i></button>-->
<!--                </span>-->
<!--    </div>-->
<!-- Input Group -->
<!--</form>-->
<!-- Search Form -->

<main class="page-content content-wrap container">

    <?php Modal::begin([
        'id' => 'pModal',
        'header' => '<h2 class="text-center"></h2>',
    ]); ?>
    <div id='modalContent'></div>
    <?php Modal::end(); ?>
    <?= $this->render(@'navbar', ['user' => $user]) ?>
    <!--    --><?php //= $this->render(@'chat') ?>
    <?= $this->render(@'sidebar', ['user' => $user]) ?>
    <div class="page-inner">
        <div id="main-wrapper">

            <?= $content ?>
        </div>
        <?= $this->render(@'footer') ?>
    </div>
</main>
<nav class="cd-nav-container" id="cd-nav">
    <header>
        <h3>Navigation</h3>
        <a href="#0" class="cd-close-nav">Close</a>
    </header>
</nav>
<div class="cd-overlay"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
