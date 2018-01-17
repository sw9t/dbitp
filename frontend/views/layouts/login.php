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
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Steelcoders"/>

    <!-- Styles -->
</head>

<body class="page-login">
<?php $this->beginBody() ?>

<main class="page-content">
    <div class="page-inner">
        <div id="main-wrapper">
            <h1 class="text-center"><a href="/" class="text-xl">Helpdesk</a></h1>
            <br>
            <br>
            <div class="row">
                <?= $content ?>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
    </div><!-- Page Inner -->
    <div class="page-footer" style="width: 100%; position: relative">
        <p class="text-center m-t-xs text-sm"><?= date('Y') ?> &copy; Application.</p>
    </div>
</main><!-- Page Content -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
