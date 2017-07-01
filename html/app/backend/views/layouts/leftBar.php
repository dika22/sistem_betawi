<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\User;
use common\controllers\BackendAppController;

$username = \Yii::$app->user->identity['username'];
?>
<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        <li>
            <a href="<?=Url::to(['/'])?>">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="<?=Url::to(['post/index'])?>">
                <i class="fa fa-newspaper-o"></i>
                <span>Post</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-image"></i>
                <span>Gambar</span>
            </a>
            <ul class="sub">
                <li><a  href="<?=Url::to(['gallery/index'])?>">Bank Gambar</a></li>
            </ul>
            <ul class="sub">
                <li><a  href="<?= Url::to(['gallery-album/index'])?>">Album Gambar</a></li>
            </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-video-camera"></i>
                <span>Video</span>
            </a>
            <ul class="sub">
                <li><a  href="<?=Url::to(['video/index'])?>">Bank Video</a></li>
            </ul>
            <ul class="sub">
                <li><a  href="<?= Url::to(['video-album/index'])?>">Album Video</a></li>
            </ul>
        </li>
        
         <?php

        $isAdmin = User::isUserAdmin($username);
        $isSuperAdmin = User::isUserSuperAdmin($username);
        
        if($isAdmin || $isSuperAdmin):
        ?>
        <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-certificate"></i>
                <span>Master</span>
            </a>
            <ul class="sub">
                <li><a  href="<?= Url::to(['personal-team/index'])?>">Personal Team</a></li>
            </ul>
        </li>
        <?php endif;?>
    </ul>
    <!-- sidebar menu end-->
</div>
