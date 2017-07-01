<?php

namespace frontend\themes\watcher\appassets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author adhika <adhikapamungkas22@gmail.com>
 * @since 2.0
 */
class TweeCoolAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/watcher/assets';

    public $css = [
    	//'css/ticker-style.css',
    ];
    
    public $js = [
    'js/tweecool.min.js',
    'js/sticky.js',
    ];

    //public $jsOptions = ['position'=>View::POS_HEAD];

    public $depends = [];
}

