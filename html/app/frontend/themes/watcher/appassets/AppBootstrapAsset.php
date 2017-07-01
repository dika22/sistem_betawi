<?php

namespace frontend\themes\watcher\appassets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author adhika <adhikapamungkas22@gmail.com>
 * @since 2.0
 */
class AppBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/watcher/assets';

    public $css = [
    	'css/bootstrap.min.css',
    	'css/font-awesome/css/font-awesome.min.css',
        'css/ts.css',
         'js/slick/slick.css',
        'js/lity/lity.min.css',
        'css/style.css',
    ];
    
    public $js = [
       
            ];

    //public $jsOptions = ['position'=>View::POS_HEAD];

    public $depends = [];
}
