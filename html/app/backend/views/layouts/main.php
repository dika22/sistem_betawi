<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="Cache-control" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?= Html::jsFile('@web/fatlab/js/jquery.js') ?>

    <title><?= Html::encode($this->title) ?></title>
    <?= Html::jsFile('@web/fatlab/js/html5shiv.js', ['condition'=>'lt IE 9']) ?>
    <?= Html::jsFile('@web/fatlab/js/respond.min.js', ['condition'=>'lt IE 9']) ?>

    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <section id="container" class="">
        <!--header start-->
        <header class="header white-bg">
            <?= $this->render('header')?>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <?= $this->render('leftBar')?>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->

        <!-- Right Slidebar start -->
        <div class="sb-slidebar sb-right sb-style-overlay">
            <?= $this->render('rightBar')?>
        </div>
        <!-- Right Slidebar end -->

        <!--footer start-->
        <footer class="site-footer">
            <?= $this->render('footer')?>
        </footer>
        <!--footer end-->
    </section>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
