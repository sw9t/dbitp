<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\apidoc\templates\bootstrap\SideNavWidget;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Admin Dashboard Template"/>
        <meta name="keywords" content="admin,dashboard"/>
        <meta name="author" content="Steelcoders"/>
        <!-- Styles -->
        <!-- Theme Styles -->
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
        <title><?= Html::encode($this->title) ?></title>
    </head>
    <body class="page-header-fixed page-horizontal-bar compact-menu page-sidebar-fixed">
    <?php $this->beginBody() ?>
    <div class="overlay"></div>
    <main class="page-content content-wrap container">
        <?= $this->render(@'navbar') ?>
        <?= $this->render(@'sidebar') ?>
        <div class="page-inner">
            <?= $content ?>
            <?= $this->render(@'footer') ?>
        </div><!-- Page Inner -->
    </main><!-- Page Content -->
    <div class="cd-overlay"></div>
    <?php $this->endBody() ?>

    <script src="/plugins/offcanvasmenueffects/js/classie.js"></script>
    <script src="/plugins/offcanvasmenueffects/js/main.js"></script>
    <script src="/plugins/waves/waves.min.js"></script>
    <script src="/plugins/3d-bold-navigation/js/main.js"></script>
    </body>
    </html>
<?php $this->endPage() ?>