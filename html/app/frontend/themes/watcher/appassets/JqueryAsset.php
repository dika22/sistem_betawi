<?php

namespace frontend\themes\watcher\appassets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author adhika <adhikapamungkas22@gmail.com>
 * @since 2.0
 */
class JqueryAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/watcher/assets';

    public $css = [

    //'css/font-awesome.min.css',
    //'css/fontgoogleapis.css',
    	
    ];
    
    public $js = [
    'js/jquery.min.js',
    'js/bootstrap.min.js',

    ];

    //public $jsOptions = ['position'=>View::POS_HEAD];

    public $depends = [];
}
