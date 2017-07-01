<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
use common\models\Gallery;
//SEO
$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->params['keywords']['common']]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->params['description']['common']]);
$this->registerMetaTag(['rel' => 'canonical', 'href' => Yii::$app->request->absoluteUrl]);

$this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['property' => 'og:site_name', 'content' => 'AeroSpace.id']);
//$this->registerMetaTag(['property' => 'og:image', 'content' => $image]);
$this->registerMetaTag(['property' => 'og:url', 'content' => Yii::$app->request->absoluteUrl]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $this->title ]);

$this->registerMetaTag(['property' => 'twitter:card', 'content' => 'summary_large_image']);
//$this->registerMetaTag(['property' => 'twitter:site', 'content' => '@carreview_id' ]);
//$this->registerMetaTag(['property' => 'twitter:image', 'content' => $image]);
//$this->registerMetaTag(['property' => 'twitter:site:id', 'content' => '@carreview_id' ]);
$this->registerMetaTag(['property' => 'twitter:description', 'content' => Yii::$app->params['description']['common']]);
$limit = 5;

$this->title ='Advertising'. ' | '.Yii::$app->params['comonTitle'];
?>
<br>
<!-- CONTENT -->
<div class="container single-post padding-bottom-30">
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-8 col-sm-7 padding-bottom-30">
			
				
			</div>
		<!-- end related article -->
		<!-- SIDEBAR -->
			<aside class="col-md-4 col-sm-4">
                <div class="side-widget margin-bottom-50">
                    <div class="ads ad-300">
                    <?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>'324'])?>
                    </div>
                </div>          
                <div class="side-widget margin-bottom-50">
                    <div class="ads ad-300">
                     <?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>'325'])?>
                    </div>
                </div>
                <div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Trending</span></h3>
                    <div class="trending-box">
                        <ul class="trending padding-bottom-30">
                        <?php foreach ($popular as $key => $valTop):
                            $image =  Gallery::findOne($valTop['image']);
                            $imageThumb = FrontendAppController::imageThumb('gallery/'.$image['image'],150, 84);
                            $groupSlug = FrontendAppController::slugify($valTop['category']['name']);
                            $titleSlug = FrontendAppController::slugify($valTop['title']);
                            $articleUrlTop = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$valTop['id']]);

                        ?>
                            <li>
                                <div class="thumb">
                                    <div class="overlay-alt"></div>
                                    <img src=" <?= $imageThumb ?>" width="100%" class="img-responsive">
                                </div>
                                <h4><a href="<?= $articleUrlTop; ?>"><?= $valTop['title']; ?></a></h4>
                                </li>
                        <?php endforeach; ?>
                    </ul>     
                    </div>
                </div>
                
               	<div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Featured Posts</span></h3>
                    <ul class="trending padding-bottom-30">
                    <?php foreach ($model as $key => $Rvalue):
                    	$image =  Gallery::findOne($Rvalue['image']);
                        $imageThumb=FrontendAppController::imageThumb('gallery/'.$image['image'],150, 84);
                        $groupSlug = FrontendAppController::slugify($Rvalue['category']['name']);
                        $titleSlug = FrontendAppController::slugify($Rvalue['title']);
                        $articleUrlTop = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$Rvalue['id']]);
                    ?>
                            <li>
                                <div class="thumb">
                                    <div class="overlay-alt"></div>
                                    <img src=" <?= $imageThumb; ?>" width="100%" class="img-responsive">
                                </div>
                                <h4><a href="<?= $articleUrlTop; ?>"><?= $Rvalue['title']; ?></a></h4>
                            </li>
                    <?php endforeach; ?>
                    </ul>
                    
                </div>              
            </aside>
		<!-- // SIDEBAR -->

		</div>
	</div>
<!-- // CONTENT -->