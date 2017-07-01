<?php
use common\models\Gallery;
use yii\helpers\Url;
use common\controllers\FrontendAppController;

// $this->title ='About Us'. ' | '.Yii::$app->params['comonTitle'];
?>
	<br>
		<!-- block-wrapper-section -->
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<!-- block content -->
						<div class="block-content">
							<!-- single-post box -->
							<br>
							<div class="single-post-box">
								<div class="title-post">
									<h1><a href="<?=Url::toRoute(['static/aboutus'])?>" alt="About Bus-truck.id">About Sistem Betawi</a></h1>
								</div>
								<br>
								<div class="panel panel-default">
  									<div class="panel-body">
    									<p>aaaa</p>
  									</div>
								</div>
							</div>
							<!-- End single-post box -->
						</div>
						<!-- End block content -->
					</div>

					<!-- SIDEBAR -->
			<aside class="col-md-4 col-sm-4">
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
		</section>
		<!-- End block-wrapper-section -->