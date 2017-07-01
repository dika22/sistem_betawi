<?php
use common\models\Gallery;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
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

$this->title = Yii::$app->params['comonTitle'];
?>
<br>
		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<!-- block content -->
						<div class="block-content">

							<!-- single-post box -->
							<div class="single-post-box">

								<div class="title-post">
									<h1><a href="<?=Url::toRoute(['static/disclaimer'])?>" alt="About CarReview.id">Pedoman Media Siber</a></h1>
									
								</div>
								<div class="panel panel-default">
  									<div class="panel-body">
   									 	<p>PEDOMAN PEMBERITAAN MEDIA SIBER</p>
						                <p>Kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers adalah hak asasi manusia yang dilindungi Pancasila, Undang-Undang Dasar 1945, dan Deklarasi Universal Hak Asasi Manusia PBB. Keberadaan media siber di Indonesia juga merupakan bagian dari kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers.</p>
						                <p>Media siber memiliki karakter khusus sehingga memerlukan pedoman agar pengelolaannya dapat dilaksanakan secara profesional, memenuhi fungsi, hak, dan kewajibannya sesuai Undang-Undang Nomor 40 Tahun 1999 tentang Pers dan Kode Etik Jurnalistik. Untuk itu Dewan Pers bersama organisasi pers, pengelola media siber, dan masyarakat menyusun Pedoman Pemberitaan Media Siber sebagai berikut:</p>
						                <p>1. Ruang Lingkup</p>
						                <p>3. Media Siber adalah segala bentuk media yang menggunakan wahana internet dan melaksanakan kegiatan jurnalistik, serta memenuhi persyaratan Undang-Undang Pers dan Standar Perusahaan Pers yang ditetapkan Dewan Pers.</p>
						                <p>4. Isi Buatan Pengguna (User Generated Content) adalah segala isi yang dibuat dan atau dipublikasikan oleh pengguna media siber, antara lain, artikel, gambar, komentar, suara, video dan berbagai bentuk unggahan yang melekat pada media siber, seperti blog, forum, komentar pembaca atau pemirsa, dan bentuk lain.</p>
						                <p>2. Verifikasi dan keberimbangan berita<br />a. Pada prinsipnya setiap berita harus melalui verifikasi.<br />b. Berita yang dapat merugikan pihak lain memerlukan verifikasi pada berita yang sama untuk memenuhi prinsip akurasi dan keberimbangan.<br />c. Ketentuan dalam butir (a) di atas dikecualikan, dengan syarat:1) Berita benar-benar mengandung kepentingan publik yang bersifat mendesak; 2) Sumber berita yang pertama adalah sumber yang jelas disebutkan identitasnya, kredibel dan kompeten; 3) Subyek berita yang harus dikonfirmasi tidak diketahui keberadaannya dan atau tidak dapat diwawancarai; 4) Media memberikan penjelasan kepada pembaca bahwa berita tersebut masih memerlukan verifikasi lebih lanjut yang diupayakan dalam waktu secepatnya. Penjelasan dimuat pada bagian akhir dari berita yang sama, di dalam kurung dan menggunakan huruf miring. <br />d. Setelah memuat berita sesuai dengan butir (c), media wajib meneruskan upaya verifikasi, dan setelah verifikasi didapatkan, hasil verifikasi dicantumkan pada berita pemutakhiran (update) dengan tautan pada berita yang belum terverifikasi.</p>
						                <p>3. Isi Buatan Pengguna (User Generated Content)<br />a. Media siber wajib mencantumkan syarat dan ketentuan mengenai Isi Buatan Pengguna yang tidak bertentangan dengan Undang-Undang No. 40 tahun 1999 tentang Pers dan Kode Etik Jurnalistik, yang ditempatkan secara terang dan jelas.<br />b. Media siber mewajibkan setiap pengguna untuk melakukan registrasi keanggotaan dan melakukan proses log-in terlebih dahulu untuk dapat mempublikasikan semua bentuk Isi Buatan Pengguna. Ketentuan mengenai log-in akan diatur lebih lanjut.<br />c. Dalam registrasi tersebut, media siber mewajibkan pengguna memberi persetujuan tertulis bahwa Isi Buatan Pengguna yang dipublikasikan:1) Tidak memuat isi bohong, fitnah, sadis dan cabul; 2) Tidak memuat isi yang mengandung prasangka dan kebencian terkait dengan suku, agama, ras, dan antargolongan (SARA), serta menganjurkan tindakan kekerasan; 3) Tidak memuat isi diskriminatif atas dasar perbedaan jenis kelamin dan bahasa, serta tidak merendahkan martabat orang lemah, miskin, sakit, cacat jiwa, atau cacat jasmani. <br />d. Media siber memiliki kewenangan mutlak untuk mengedit atau menghapus Isi Buatan Pengguna yang bertentangan dengan butir (c).<br />e. Media siber wajib menyediakan mekanisme pengaduan Isi Buatan Pengguna yang dinilai melanggar ketentuan pada butir (c). Mekanisme tersebut harus disediakan di tempat yang dengan mudah dapat diakses pengguna.<br />f. Media siber wajib menyunting, menghapus, dan melakukan tindakan koreksi setiap Isi Buatan Pengguna yang dilaporkan dan melanggar ketentuan butir (c), sesegera mungkin secara proporsional selambat-lambatnya 2 x 24 jam setelah pengaduan diterima.<br />g. Media siber yang telah memenuhi ketentuan pada butir (a), (b), (c), dan (f) tidak dibebani tanggung jawab atas masalah yang ditimbulkan akibat pemuatan isi yang melanggar ketentuan pada butir (c).<br />h. Media siber bertanggung jawab atas Isi Buatan Pengguna yang dilaporkan bila tidak mengambil tindakan koreksi setelah batas waktu sebagaimana tersebut pada butir (f).</p>
						                <p>4. Ralat, Koreksi, dan Hak Jawab<br />a. Ralat, koreksi, dan hak jawab mengacu pada Undang-Undang Pers, Kode Etik Jurnalistik, dan Pedoman Hak Jawab yang ditetapkan Dewan Pers.<br />b. Ralat, koreksi dan atau hak jawab wajib ditautkan pada berita yang diralat, dikoreksi atau yang diberi hak jawab.<br />c. Di setiap berita ralat, koreksi, dan hak jawab wajib dicantumkan waktu pemuatan ralat, koreksi, dan atau hak jawab tersebut.<br />d. Bila suatu berita media siber tertentu disebarluaskan media siber lain, maka:1) Tanggung jawab media siber pembuat berita terbatas pada berita yang dipublikasikan di media siber tersebut atau media siber yang berada di bawah otoritas teknisnya; 2) Koreksi berita yang dilakukan oleh sebuah media siber, juga harus dilakukan oleh media siber lain yang mengutip berita dari media siber yang dikoreksi itu; 3) Media yang menyebarluaskan berita dari sebuah media siber dan tidak melakukan koreksi atas berita sesuai yang dilakukan oleh media siber pemilik dan atau pembuat berita tersebut, bertanggung jawab penuh atas semua akibat hukum dari berita yang tidak dikoreksinya itu. <br />e. Sesuai dengan Undang-Undang Pers, media siber yang tidak melayani hak jawab dapat dijatuhi sanksi hukum pidana denda paling banyak Rp500.000.000 (Lima ratus juta rupiah).</p>
						                <p>5. Pencabutan Berita<br />a. Berita yang sudah dipublikasikan tidak dapat dicabut karena alasan penyensoran dari pihak luar redaksi, kecuali terkait masalah SARA, kesusilaan, masa depan anak, pengalaman traumatik korban atau berdasarkan pertimbangan khusus lain yang ditetapkan Dewan Pers.<br />b. Media siber lain wajib mengikuti pencabutan kutipan berita dari media asal yang telah dicabut.<br />c. Pencabutan berita wajib disertai dengan alasan pencabutan dan diumumkan kepada publik.<br />6. Iklan<br />a. Media siber wajib membedakan dengan tegas antara produk berita dan iklan.<br />b. Setiap berita/artikel/isi yang merupakan iklan dan atau isi berbayar wajib mencantumkan keterangan 'advertorial', 'iklan', 'ads', 'sponsored', atau kata lain yang menjelaskan bahwa berita/artikel/isi tersebut adalah iklan.</p>
						                <p>7. Hak Cipta<br />Media siber wajib menghormati hak cipta sebagaimana diatur dalam peraturan perundang-undangan yang berlaku.</p>
						                <p>8. Pencantuman Pedoman<br />Media siber wajib mencantumkan Pedoman Pemberitaan Media Siber ini di medianya secara terang dan jelas.</p>
						                <p>9. Sengketa<br />Penilaian akhir atas sengketa mengenai pelaksanaan Pedoman Pemberitaan Media Siber ini diselesaikan oleh Dewan Pers.<br />&nbsp;<br />Jakarta, 3 Februari 2012<br />(Pedoman ini ditandatangani oleh Dewan Pers dan komunitas pers di Jakarta, 3 Februari 2012).<br />&nbsp;<br />sumber :&nbsp;http://www.dewanpers.or.id/page/kebijakan/pedoman/?id=494</p>
  									</div>
								</div>
							</div>
							<!-- End single-post box -->
						</div>
						<!-- End block content -->
					</div>
                    <br>
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
		</section>
		<!-- End block-wrapper-section -->
		<script type="text/javascript">
			$(document).ready(function(){
				$(".sticky").stick_in_parent()
		  			.on("sticky_kit:stick", function(e) {
		    			console.log("has stuck!", e.target);
		  				})
		 			.on("sticky_kit:unstick", function(e) {
		    			console.log("has unstuck!", e.target);
		 		});
			});
		</script>