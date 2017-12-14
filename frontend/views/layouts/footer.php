<?php

use yii\helpers\Html;

?>
<div class="page-footer">
    <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    <p class="pull-right"><?= Yii::powered() ?></p>
</div>
