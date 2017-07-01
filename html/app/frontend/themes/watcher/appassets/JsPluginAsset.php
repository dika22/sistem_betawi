<?php

namespace frontend\themes\watcher\appassets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author adhika <adhikapamungkas22@gmail.com>
 * @since 2.0
 */
class JsPluginAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/watcher/assets';

    public $css = [
        'css/style.css',
    ];
    
    public $js = [
    'js/slick/slick.min.js',
    'js/socialShare.min.js',
    'js/jquery.simpleWeather.min.js',
    'js/lity/lity.min.js',
    ];

    //public $jsOptions = ['position'=>View::POS_HEAD];

    public $depends = [];
}

