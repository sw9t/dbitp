<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?php //= Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Steelcoders"/>

    <!-- Styles -->
    <link href="/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>

    <!-- Theme Styles -->
    <link href="/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/themes/blue.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="/css/custom.css" rel="stylesheet" type="text/css"/>

    <script src="/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
</head>

<body class="page-header-fixed">
<?php $this->beginBody() ?>
<div class="overlay"></div>


<div class="menu-wrap">
    <nav class="profile-menu">
        <div class="profile"><img src="/images/profile-menu-image.png" width="60"
                                  alt="David Green"/><span>David Green</span>
        </div>
        <div class="profile-menu-list">
            <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
            <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
            <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
            <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
        </div>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
</div>
<form class="search-form" action="#" method="GET">
    <div class="input-group">
        <input type="text" name="search" class="form-control search-input" placeholder="Search...">
        <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic"
                            type="button"><i class="fa fa-times"></i></button>
                </span>
    </div><!-- Input Group -->
</form><!-- Search Form -->
<main class="page-content content-wrap container">
    <?= $this->render(@'navbar') ?>
    <?= $this->render(@'chat') ?>
    <?= $this->render(@'sidebar') ?>
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
