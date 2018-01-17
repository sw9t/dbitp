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
        'plugins/pace-master/themes/blue/pace-theme-flash.css',
//        'plugins/offcanvasmenueffects/css/menu_cornerbox.css',
        'plugins/uniform/css/uniform.default.min.css',
        'plugins/line-icons/simple-line-icons.css',
        'plugins/fontawesome/css/font-awesome.css',
        'plugins/3d-bold-navigation/css/style.css',
        'plugins/slidepushmenus/css/component.css',
        'plugins/switchery/switchery.css',
        'plugins/waves/waves.min.css',
        'css/modern.min.css',
        'css/themes/blue.css',
        'css/custom.css',
    ];
    public $js = [
        'plugins/jquery-blockui/jquery.blockui.js',
        'plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'plugins/waves/waves.min.js',
        'plugins/uniform/jquery.uniform.min.js',
        'plugins/switchery/switchery.js',
//        '/plugins/offcanvasmenueffects/js/classie.js',
//        '/plugins/offcanvasmenueffects/js/main.js',
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
