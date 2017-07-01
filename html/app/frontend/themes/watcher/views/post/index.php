<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
use common\models\Gallery;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
//SEO
?>
<br>
<br>
<br>
<!-- CATEGORY -->
	<div class="container padding-bottom-30">
		<div class="row">
			<div class="col-md-8 col-sm-7 more-posts padding-bottom-30">
				<div class="row">
				<?php foreach ($model as $key => $valM):
				?>
				<?php foreach ($valM as $key => $value):
				//print_r($value);
				//die();
				$image =  Gallery::findOne($value['image']);
                $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                $groupSlug = FrontendAppController::slugify($value['category']['name']);
                $titleSlug = FrontendAppController::slugify($value['title']);
                $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$value['id']]);
                $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$value['category']['id']]);
				?>
					<div class="col-md-6 col-sm-6">
						<div class="layout_3--item border">
							<div class="thumb">
								<div class="icon-24 video2"></div>
								<a href="./post_page_01.html">
									<img src=" <?= $imageThumb?>" width="100%" class="img-responsive ">
								</a>
							</div>
							<h4><a href="<?= $articleUrl ?>"><?php echo $value['title']; ?></a></h4>
							<div class="meta"><span class="author"><?php echo $value['author0']['name']; ?></span><span class="date"><?php echo date('d F Y',strtotime($value['post_date'])); ?></span></div>
						</div>
					</div>
				<?php endforeach ?>
				<?php endforeach ?>
				</div>
				<hr class="l3 hidden-xs">
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
			<aside class="col-md-4 col-sm-5">
				<div class="side-widget margin-bottom-60">
					<h3 class="heading-1"><span>Follow Us</span></h3>
					<div class="side-share side-share2">
						<div class='share s_facebook'>
							<i class="fa fa-facebook"></i>
							<div class='counter c_facebook'></div>
							<span>fans</span>
						</div>
						<div class='share s_linkedin'>
							<i class="fa fa-linkedin"></i>
							<div class='counter c_linkedin'></div>
							<span>followers</span>
						</div>
						<div class='share s_plus'>
							<i class="fa fa-google-plus"></i>
							<div class='counter c_plus'></div>
							<span>followers</span>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="side-widget margin-bottom-30">
					<h3 class="heading-1"><span>Most Popular</span></h3>
					<div class="layout_1--item">
						<a href="#">
							<span class="badge text-uppercase badge-overlay badge-tech">Tech</span>
							<div class="overlay"></div>
							<img src="images/category/01/10.jpg" class="img-responsive" alt="">
							<div class="layout-detail padding-25">
								<h6>Retailers' Apple Pay Competitor Has Already Been Hacked</h6>
								<div class="meta"><span class="author">by Mahita G.</span><span class="date">Sep. 24, 2016</span><span class="comments">1</span></div>
							</div>
						</a>
					</div>

					<ul class="trending padding-top-30 padding-bottom-30">
						<div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Terbaru</span></h3>
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
					</ul>
				</div>
			</aside>
			<!-- // SIDEBAR -->
		</div>
	</div>
	<!-- // CONTENT -->
