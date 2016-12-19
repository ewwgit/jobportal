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
    public $script = [
    		
    		'script/bootstrap.min.js',
    			'script/chosen.jquery.min.js',
    		'script/custom.js',
    		'script/headroom.min.js',
    		'script/jquery-2.1.3.min.js',
    		'script/jquery.counterup.min.js',
    		'script/jquery.flexslider-min.js',
    		'script/jquery.gmaps.min.js',
    		'script/jpanelmenu.js',
    		'script/jquery.magnific-popup.min.js',
    		'script/jquery.sceditor.bbcode.min.js',
    		'script/jquery.sceditor.js',
    		'script/jquery.superfish.js',
    		'script/jquery.themepunch.revolution.min.js',
    		'script/jquery.themepunch.showbizpro.min.js',
    		'script/jquery.themepunch.tools.min.js',
    		'script/stacktable.js',
    		'script/switcher.js',
    		'script/vendor-date.js',
    		'script/vendor-datepicker.js',
    		'script/Waypoints.min.js',
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
