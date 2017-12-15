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
//        'css/site.css',
        'css/fonts.css',
        'plugins/fontawesome/css/font-awesome.css',
        'plugins/uniform/css/uniform.default.min.css',
        'plugins/switchery/switchery.css',
        'css/modern.min.css',
        'css/custom.css',
        'css/themes/blue.css',
    ];
    public $js = [
        'plugins/jquery-blockui/jquery.blockui.js',
        'plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'plugins/waves/waves.min.js',
        'plugins/uniform/jquery.uniform.min.js',
        'plugins/switchery/switchery.js',
        '/plugins/offcanvasmenueffects/js/classie.js',
        '/plugins/offcanvasmenueffects/js/main.js',
        '/plugins/3d-bold-navigation/js/main.js',
        'js/modern.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\YiiAsset',
    ];
}
