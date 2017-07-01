<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
use common\models\Gallery;
use yii\widgets\LinkPager;


//$this->title = $category->name.' | '.Yii::$app->params['comonTitle'];
?>

								
	<!-- CATEGORY -->
	<div class="container padding-bottom-30">
		<div class="clearfix">&nbsp;</div>
			<header>
				<h2>Search Results for : "<?=$search?>"</h2> <?=number_format($count)?> articles found
					<span class="borderline"></span>
			</header>
		<div class="clearfix">&nbsp;</div>
			<div class="col-md-12 text-center">
				<form class="form-inline" action="<?=Url::to(['/search'])?>">
					<div class="form-group">
						<input type="text" class="form-control" name="q" placeholder="Search..." value="<?=$search?>" />
					</div>
					<button class="btn btn-default">
						<i class="fa fa-search">&nbsp;</i>
					</button>
				</form>
			</div>
		<div class="clearfix">&nbsp;</div>
			<?php if(empty($models)):?>
				<h2>Nothing Found</h2>
				<h4>Sorry, but nothing matched your search terms. Please try again with some different keywords.</h4>
			<?php endif;?>
		<div class="clearfix">&nbsp;</div>
		<div class="row">
		<?php
		$image =  Gallery::findOne($models[0]['image']);	
		$imageThumb = FrontendAppController::imageThumb('gallery/'.$image['image'],705,397 );
		$thumb = FrontendAppController::imageThumb('otodrivercom.png', 265, 149);
			if (!empty($imageThumb)) {
				$imageThumb;
				}else{
					$thumb;
				}
				$title = $models[0]['title'];
				//$teaser = $model[0]->teaser;
				//$articleUrl = Url::to(['detail/'.$value['id']]);
		$groupSlug = FrontendAppController::slugify($models[0]['category']['name']);
		$titleSlug = FrontendAppController::slugify($models[0]['title']);
		$articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$models[0]['id']]);
		?>		
			<div class="col-md-8 col-sm-7 dual-posts padding-bottom-30">
			
				<?php
					//unset($models[0]);
					foreach ($models as $key => $value):
					$image =  Gallery::findOne($value['image']);	
					$imageThumb = FrontendAppController::imageThumb('gallery/'.$image['image'],330,186 );
					$thumb = FrontendAppController::imageThumb('otodrivercom.png', 265, 149);
										 
					//$teaser = $value->teaser;
					//$articleUrl = Url::to(['detail/'.$value['id']]);
					$groupSlug = FrontendAppController::slugify($value['category']['name']);
					$titleSlug = FrontendAppController::slugify($value['title']);
					$articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$value['id']]);

				?>
				<div class="row">
					<div class="layout_3--item">
						<div class="col-md-6 col-sm-6">
							<div class="thumb">
								<div class="icon-24 video2"></div>
								<a href="./post_page_01.html">
								<img src=" <?= $imageThumb;?>" width="100%" class="img-responsive">
								</a>
							</div>
						</div>

						<div class="col-md-6 col-sm-6">							
							<span class="cat"><?= $value['category']['name'] ?></span>
							<h4><a href="<?= $articleUrl ?>"><?= $value['title']; ?></a></h4>
							<p><?= $value['teaser']; ?></p>
							<div class="meta"><span class="author"><?= $value['author0']['name']; ?></span><span class="date"><?= date('d F Y',strtotime($value['post_date'])); ?></span></div>
						</div>
					</div>
				
				</div>
				
				<hr class="l4">
				<?php endforeach ?>
				

				<!-- PAGINATION -->
				<ul class="pagination">
					<li>
						<?php
                            echo LinkPager::widget([
                            'pagination' => $pages,
                            'linkOptions' => ['class' => '']
                        ]);?>
                    </li>
				</ul>
			</div>
			<!-- // CATEGORY -->

			<!-- SIDEBAR -->
			<aside class="col-md-4 col-sm-4">
                <div class="side-widget margin-bottom-50">
                    <div class="ads ad-300">
                    <?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>'316'])?>
                    </div>
                </div>          
                <div class="side-widget margin-bottom-50">
                    <div class="ads ad-300">
                    <?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>'311'])?>
                    </div>
                </div>
                <div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Trending</span></h3>

                    <div class="trending-box">
                        <ul class="trending padding-bottom-30">
                      
                    </ul>     
                    </div>
                </div>
                
                <div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Featured Posts</span></h3>
                    <ul class="trending padding-bottom-30">
                    <?php foreach ($recent as $key => $Rvalue):
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

                <div class="side-widget margin-bottom-60">
                    <h3 class="heading-1"><span>Newsletter</span></h3>

                    <div class="post-subscribe margin-bottom-60">
                        <p>Get the best viral stories straight into your inbox!</p>

                        <form action="php/subscribe.php" id="invite" method="POST">
                            <i class="fa fa-envelope"></i>
                            <input type="email" placeholder="Your Email address" class="e-mail" name="email" id="address" data-validate="validate(required, email)">
                            <button type="submit">Subscribe</button>
                        </form>
                        <span>Don't worry we hate spam as much as you do</span>
                        <div id="result"></div>                             
                        
                    </div>                  
                </div>                
            </aside>
			<!-- // SIDEBAR -->

		</div>
	</div>
	<!-- // CONTENT -->