<?php
use yii\helpers\Html;

use common\models\Setting;

use frontend\themes\watcher\appassets\JqueryAsset;
use frontend\themes\watcher\appassets\AppBootstrapAsset;
use frontend\themes\watcher\appassets\JsPluginAsset;
use frontend\themes\watcher\appassets\MailchimpAsset;
use frontend\themes\watcher\appassets\StyleAsset;
use frontend\themes\watcher\appassets\ThemeAsset;
use frontend\themes\watcher\appassets\TweeCoolAsset;



JqueryAsset::register($this);
AppBootstrapAsset::register($this);
JsPluginAsset::register($this);
ThemeAsset::register($this);
MailchimpAsset::register($this);
StyleAsset::register($this);
TweeCoolAsset::register($this);


//$bannerList = FrontendAppController::getBannerZone(7);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  @media only screen and (max-width: 1220px) {
    #skin-ads{display: none}
  }
  audio, embed, img, object, video{
  max-width: 100%;
  }
</style>
<head>
    <meta charset="UTF-8"/>
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title><?= Html::encode($this->title) ?></title>
    <!-- Google analitycs -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99299171-1', 'auto');
  ga('send', 'pageview');

</script>
    <!-- End Google analitycs -->
    <?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	<div class="wrapper">
      <?=$this->render('header')?>
                  <?php echo $content;?>
      <?=$this->render('footer')?>     
	</div>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
