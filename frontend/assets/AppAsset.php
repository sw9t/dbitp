<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fonts.css',
        'plugins/fontawesome/css/font-awesome.css',
        'css/modern.css',
        'css/themes/green.css',
        'plugins/uniform/css/uniform.default.min.css',
        'plugins/switchery/switchery.css',
    ];
    public $js = [
        'js/modern.min.js',
        'js/custom.js',
        'plugins/jquery-blockui/jquery.blockui.js',
        'plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'plugins/waves/waves.min.js',
        'plugins/uniform/jquery.uniform.min.js',

        'plugins/switchery/switchery.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
