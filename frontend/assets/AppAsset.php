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
    public $scripts = [
    		
    		'scripts/bootstrap.min.js',
    		'scripts/chosen.jquery.min.js',
    		'scripts/custom.js',
    		'scripts/headroom.min.js',
    		'scripts/jquery-2.1.3.min.js',
    		'scripts/jquery.counterup.min.js',
    		'scripts/jquery.flexslider-min.js',
    		'scripts/jquery.gmaps.min.js',
    		'scripts/jpanelmenu.js',
    		'scripts/jquery.magnific-popup.min.js',
    		'scripts/jquery.sceditor.bbcode.min.js',
    		'scripts/jquery.sceditor.js',
    		'scripts/jquery.superfish.js',
    		'scripts/jquery.themepunch.revolution.min.js',
    		'scripts/jquery.themepunch.showbizpro.min.js',
    		'scripts/jquery.themepunch.tools.min.js',
    		'scripts/stacktable.js',
    		'scripts/switcher.js',
    		'scripts/vendor-date.js',
    		'scripts/vendor-datepicker.js',
    		'scripts/Waypoints.min.js',
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
