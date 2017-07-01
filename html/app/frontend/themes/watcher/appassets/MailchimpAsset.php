<?php

namespace frontend\themes\watcher\appassets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author adhika <adhikapamungkas22@gmail.com>
 * @since 2.0
 */
class MailchimpAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/watcher/assets';

    public $css = [
    	
    ];
    
    public $js = [
    'js/mc/jquery.ketchup.all.min.js',
    'js/mc/main.js',
    ];

    //public $jsOptions = ['position'=>View::POS_HEAD];

    public $depends = [];
}

