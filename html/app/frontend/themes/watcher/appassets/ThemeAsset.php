<?php

namespace frontend\themes\watcher\appassets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author adhika <adhikapamungkas22@gmail.com>
 * @since 2.0
 */
class ThemeAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/watcher/assets';

    public $css = [
    	//'css/owl.carousel.css',
    	//'css/owl.theme.css'
    ];
    
    public $js = [
    'js/main.js',
    ];

    //public $jsOptions = ['position'=>View::POS_HEAD];

    public $depends = [];
}