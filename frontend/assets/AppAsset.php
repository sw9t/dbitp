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
        'css/site.css',
//        'css/fonts.css',
//        'plugins/fontawesome/css/font-awesome.css',
//        'css/modern.css',
//        'css/themes/green.css',
//        'plugins/uniform/css/uniform.default.min.css',
//        'plugins/switchery/switchery.css',
//        'plugins/jquery/jquery-2.2.4.min.js',
    ];
    public $js = [
//        'plugins/jquery-ui/jquery-ui.min.js',
//        'plugins/bootstrap/js/bootstrap.min.js',
//        'js/modern.min.js',
//        'js/custom.js',
//        'plugins/jquery-blockui/jquery.blockui.js',
//        'plugins/jquery-slimscroll/jquery.slimscroll.min.js',
//        'plugins/waves/waves.min.js',
//        'plugins/uniform/jquery.uniform.min.js',
//        'plugins/switchery/switchery.js',
//        '/plugins/offcanvasmenueffects/js/classie.js',
//        '/plugins/offcanvasmenueffects/js/main.js',
//        '/plugins/3d-bold-navigation/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
