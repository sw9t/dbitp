<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;

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
    <link href="/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>

    <script src="/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
</head>

<body class="page-login">
<?php $this->beginBody() ?>

<main class="page-content">
    <div class="page-inner">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-4 center">
                    <div class="login-box">
                        <h1 class="text-center"><a href="/" class="text-xl ">Helpdesk</a></h1>
                        <br>
                        <br>
                        <?= $content ?>
                        <p class="text-center m-t-xs text-sm"><?= date('Y')?> &copy; Application.</p>
                    </div>
                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div><!-- Page Inner -->
</main><!-- Page Content -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
