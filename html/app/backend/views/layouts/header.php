<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\User;
use common\models\PersonalTeam;
use common\controllers\AppController;

$avatar = null;

$personalTeam = PersonalTeam::findOne(['user_id'=>Yii::$app->getUser()->id]);

if(!empty($personalTeam)){    
    $avatar = AppController::imageThumb('avatar/'.$personalTeam['avatar'], 32, 32);
 }


?>
<div class="sidebar-toggle-box">
    <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
</div>
<!--logo start-->
<a href="<?=Url::base()?>" class="logo" >
</a>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->

</div>
<div class="top-nav ">
    <ul class="nav pull-right top-menu">
        <!--<li>
            <input type="text" class="form-control search" placeholder="Search">
        </li>-->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                
                <span class="username">
                    <?=Yii::$app->user->identity->attributes['username']?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li>
                    <a href="<?=Url::to(['site/logout'])?>">
                        <i class="fa fa-key"></i> Log Out
                    </a>
                </li>
            </ul>
        </li>

        <!-- user login dropdown end -->
        <!--<li class="sb-toggle-right">
            <i class="fa  fa-align-right"></i>
        </li>-->
    </ul>
</div>
