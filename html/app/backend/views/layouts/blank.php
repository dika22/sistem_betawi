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
    <section id="container" class="container">
        <div class="col-md-12">
            <?= $content ?>
        </div>
    </section>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
