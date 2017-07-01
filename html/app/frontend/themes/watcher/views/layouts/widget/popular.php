<?php 
use common\controllers\OtoFrontendAppController;

use yii\helpers\Url;

$popular = OtoFrontendAppController::getTopArticle(5);
?>
<section class="module-news top-margin">
	<!-- start:header -->
	<header>
		<h2>Most Viewed</h2>
		<span class="borderline"></span>
	</header>
	<!-- end:header -->

	<!-- start:article-container -->
	<div class="article-container">
		<?php 
		foreach ($popular as $key => $value) {
			$thumb = OtoFrontendAppController::imageThumb('otodrivercom.png', 100, 80);
			if(!empty($value['thumbnail'])){
				$imageUrl = OtoFrontendAppController::imageThumb('gallery/' . $value['thumbnail']['image'], 100, 80);
			}else{
				$imageUrl = $thumb;
			}

			$groupSlug = OtoFrontendAppController::slugify($value['category']['name']);
			$groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$value['category']['id']]);

			$encrypt = OtoFrontendAppController::encrypt($value['id']);
			$titleSlug = OtoFrontendAppController::slugify($value['title']);
			$articleUrl = Url::toRoute(['post/view', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$value['id']]);
		?>
		<!-- start:article -->
		<article class="clearfix">
			<a href="<?=$articleUrl?>" alt="<?=$value['title']?>">
				<img width="100" height="80" class="lazyload" alt="<?=$value['title']?>" src="<?=$thumb?>" data-src="<?=$imageUrl?>">
			</a>
		
			<h3><a href="<?=$articleUrl?>" alt="<?=$value['title']?>"><?=$value['title']?></a></h3>
		</article>
		<!-- end:article -->
		<?php 
		}
		?>
	</div>
	<!-- end:article-container -->
</section>