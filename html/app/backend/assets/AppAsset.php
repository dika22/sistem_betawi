<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fatlab/css/bootstrap.min.css',
        'fatlab/css/bootstrap-reset.css',
        'fatlab/assets/font-awesome/css/font-awesome.css',
        'fatlab/css/style.css',
        'fatlab/css/style-responsive.css',
        'fatlab/css/slidebars.css'
    ];
    public $js = [
        'fatlab/js/bootstrap.min.js',
        'fatlab/js/jquery.dcjqaccordion.2.7.js',
        'fatlab/js/jquery.scrollTo.min.js',
        'fatlab/js/slidebars.min.js',
        'fatlab/js/jquery.nicescroll.js',
        'fatlab/js/respond.min.js',
        'fatlab/js/common-scripts.js'
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

}
