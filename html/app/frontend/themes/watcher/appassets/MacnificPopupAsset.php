<?php

namespace frontend\themes\watcher\appassets;

use yii\web\AssetBundle;

/**
 * @author haris <masharis8@gmail.com>
 * @since 2.0
 */
class MacnificPopupAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/watcher/assets';

    public $css = ['css/magnific-popup.css'];
    
    public $js = ['js/jquery.magnific-popup.min.js'];

    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
