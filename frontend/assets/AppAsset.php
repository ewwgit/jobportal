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
        //'css/site.css',
    		'css/base.css',
    		'css/bootstrap.min.css',
    		'css/font-awesome.css',
    		'css/responsive.css',
    		'css/style.css',
    		'css/colors/green.css'
    ];
    public $js = [
    		//'js/jquery.js',
    		'js/jquery-ui.js',
    		'js/bootstrap.min.js',
    		'js/chosen.jquery.min.js',
    		'js/custom.js',
    		'js/headroom.min.js',
    		//'js/jquery-2.1.3.min.js',
    		'js/jquery.counterup.min.js',
    		'js/jquery.flexslider-min.js',
    		'js/jquery.gmaps.min.js',
    		'js/jquery.jpanelmenu.js',
    		'js/jquery.magnific-popup.min.js',
    		'js/jquery.sceditor.bbcode.min.js',
    		'js/jquery.sceditor.js',
    		'js/jquery.superfish.js',
    		'js/jquery.themepunch.revolution.min.js',
    		'js/jquery.themepunch.showbizpro.min.js',
    		'js/jquery.themepunch.tools.min.js',
    		'js/stacktable.js',
    		'js/switcher.js',
    		'js/vendor-date.js',
    		'js/vendor-datepicker.js',
    		'js/Waypoints.min.js',
    		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
