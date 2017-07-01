<?php
use common\models\Gallery;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
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

$this->title ='About Us'. ' | '.Yii::$app->params['comonTitle'];
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
									<h1><a href="<?=Url::toRoute(['static/aboutus'])?>" alt="About Bus-truck.id">About AEROSPACE.CO.ID</a></h1>
								</div>
								<br>
								<div class="panel panel-default">
  									<div class="panel-body">
    									<p>Mendukung lingkungan yang lebih ramah, Majalah Car Review kami transformasi menjadi bentuk digital menjadi www.Carreview.id. Perubahan format ini tentu setidaknya mampu mengurangi penggunaan kertas yang berbahan dasar kayu, tinta percetakan yang menghasilkan limbah, serta sistem sirkulasi, peredaran majalah yang tentunya beroperasi menggunakan kendaraan yang menyumbang emisi gas buang ke udara yang kita hirup sehari-hari. </p>
						                <p>Car Review, disajikan bagi pengguna dan calon pengguna mobil di Indonesia. Di antara sekian banyak pilihan dan ragam mobil, kami mengerti kebutuhan Anda akan informasi yang detail terhadap mobil pilihan. Untuk itu kami memberikan referensi komparatif tentang seluk beluk mobil di Indonesia.</p>
						                <p>Tak hanya informasi komparatif mengenai mobil, yang tentunya diuji oleh tester kami yang berpengalaman yang tentu tak perlu diragukan lagi, namun juga segala hal yang berkaitan dengan mobil itu sendiri. Mulai dari komponen-komponen yang ada di dalamnya, juga barang-barang aftermarket yang tentu akan menjadi pilihan konsumen di tanah air.<br />Seluruh hasil penilaian tentang mobil dan hal yang berhubungan dengannya juga kami sajikan dengan cara yang mudah&nbsp;dicerna. Berbagai berita berupa informasi tentang industri otomotif juga disajikan dengan pembahasan khas Car Review. Seluruh&nbsp;artikel juga disusun dengan bahasa ringkas padat serta to the point. Anda juga dapat menyaksikan&nbsp;review&nbsp;dalam bentuk&nbsp;video&nbsp;yang lebih mudah lagi dicerna.&nbsp;</p>
						                <p>Satu yang selalu kami jaga adalah independensi. Seluruh&nbsp;review&nbsp;yang kami buat benar-benar&nbsp;murni penilaian profesional serta bebas dari kepentingan bisnis pabrikan mobil bersangkutan. Oleh&nbsp;karena itu kami dapat lebih obyektif memaparkan kelebihan dan kelemahan mobil yang diuji untuk dikomparasi.&nbsp;<br />&nbsp;<br />Selamat berselancar di situs kami. Apapun mobil pilihan Anda, pastikan melihat ulasannya dulu di Car Review.</p>
						                <p>Salam</p>
						                <p>Benny Averdi<br />Editor in Chief</p>
  									</div>
								</div>
							</div>
							<!-- End single-post box -->
						</div>
						<!-- End block content -->
					</div>

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
		</section>
		<!-- End block-wrapper-section -->