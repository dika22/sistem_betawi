<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
use common\models\Gallery;
//$this->title = $category->name.' | '.Yii::$app->params['comonTitle'];
?>
<!-- PAGE HEADER -->
	<div class="page_header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="bcrumbs">
						<li><a href="#">Home</a></li>
						<li><a href="#"><?= $model['category']['name'] ?></a></li>
						<li><a href="#">Detail</a></li>
						<li><?= $model->title; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- // PAGE HEADER -->
<!-- CONTENT -->
	<div class="container single-post padding-bottom-30">
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-8 col-sm-7 padding-bottom-30">
			<?php
				$img = Gallery::findOne($model['image']); 
			?>
				<div class="blog-excerpt">
				<img src="<?=FrontendAppController::imageThumb('gallery/'.$img->image, 711, 400);?>" width="100%" class="img-responsive">
					<div class="blog-single-head margin-top-25">
						<h2><?= $model->title; ?></h2>
						<div class="meta"><span class="author"><?= $model['author0']['name'] ?></span><span class="date"><?= date('d F Y',strtotime($model['post_date'])) ?></span></div>
					</div>
					<p>
						<?= $model['content']; ?>
					</p>
				</div>	

				<div class="single-topic">
				<?php if(!empty($tags)):?>
					<span>Topics:</span> 
						<ul class="tags">
							<?php foreach($tags as $key=>$values):
							$urlTags = Url::toRoute(['post/tags', 't'=>FrontendAppController::slugify($values)]);?>
						<li><a href="<?= $urlTags; ?>"><?= $values; ?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				</div>

				<div class="clearfix"></div>
				<div class="margin-bottom-10"></div>
				<div class="clearfix"></div>

				<div class="single-share">
					<span>Share:</span> 
					<div class="post-share">
						<a href="#"><i class="fa fa-facebook"></i> Share</a>
						<a href="#"><i class="fa fa-twitter"></i> Tweet</a>
					</div>
				</div>

				<div class="margin-bottom-30"></div>
				<hr class="l4">
				<div class="clearfix"></div>
				<!-- relted article -->
				<h3 class="heading-1"><span>Related Articles</span></h3>
				<div class="row margin-bottom-30">
				<?php foreach ($updatekanal as $key => $value): 
					$image =  Gallery::findOne($value['image']);
                    $imageThumb = FrontendAppController::imageThumb('gallery/'.$image['image'],150, 84);
                    $groupSlug = FrontendAppController::slugify($value['category']['name']);
                    $titleSlug = FrontendAppController::slugify($value['title']);
                    $articleUrlTop = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$value['id']]);

				?>
					<div class="col-md-4">
						<div class="layout_2--item">
							<div class="thumb">
								<a href="<?= $articleUrlTop ?>">
										<img src="<?= $imageThumb ?>" width="100%" class="img-responsive">
								</a>
							</div>
							<span class="cat"><?=  $value['category']['name'] ?></span>
							<h4><a href="<?= $articleUrlTop; ?>"><?= $value['title']; ?></a></h4>
							<div class="meta"><span class="author"><?= $value['author0']['name'] ?></span><span class="date">
								<?= date('m F Y',strtotime($value['post_date'])) ?>
							</span></div>
						</div>
					</div>
					<?php endforeach ?>
				</div>

				<!-- end related article -->
			</div>
	
			<!-- SIDEBAR -->
			<aside class="col-md-4 col-sm-4">
                <div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Trending</span></h3>
                    <div class="trending-box">
                        
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
            </aside>
			<!-- // SIDEBAR -->

		</div>
	</div>
	<!-- // CONTENT -->