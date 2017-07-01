<?php
use yii\helpers\Url;
use common\controllers\FrontendAppController;
?>

	<style type="text/css">
		.head{
			margin-bottom: -22px; 
		}
		.headimage{
			margin-top: -40px;
			margin-bottom: 40px;
			margin-right: -8px;
		}
		@media only screen and (max-width: 768px) {

			.headimage{
				
				margin-bottom: -20px;
			}
			.head{
				margin-top: -35px;
			}
		}
		@media only screen and (max-width: 970px) {
			.headimage{
				margin-bottom: 40px;
			}

		}
	</style>
	<!-- HEADER / MENU -->
	<header class="header1 header-megamenu">
	<br>
	<div class="navbar-header padding-vertical-10">
		<div class="clearfix"></div>
		<div class="container">
			<div class="row imgHead">
				<div class="col-md-4 col-xs-6 headimage">
					<a href="<?= Url::toRoute(['/']) ?>" class="navbar-brand">
						<img src=" <?= FrontendAppController::imageThumb('logo/logo.png',460, 0);?>" width="100%" class="img-responsive ">
					</a>
				</div>
			</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="container">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span>MENU</span>
			<span class="fa fa-navicon"></span>
			</button>

			<div class="search-wrap2">
				<form action="<?=Url::to(['/search'])?>">
					<input type="text" id="search" name="q" placeholder="Search here">
					<div class="sw2-close"><span class="fa fa-close"></span></div>
				</form>
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown dropdown-v2">
		                <a href="<?= Url::toRoute(['/']) ?>">Home</a>
					</li>
					<li class="dropdown">
                	<a href="<?=Url::toRoute(['post/index', 'type' => 'militer', 'id'=>1 ])?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kesenian<span class="fa fa-angle-down"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?=Url::toRoute(['post/index', 'type' => 'penerbangan', 'id'=>1 ])?>">Tari</a></li>
				<li><a href="<?=Url::toRoute(['post/index', 'type' => 'penerbangan', 'id'=>1 ])?>">Teather</a></li>
					<li><a href="<?=Url::toRoute(['post/index', 'type' => 'penerbangan', 'id'=>1 ])?>">Musik</a></li>
				</ul>
			</li>
					
					<li class="dropdown dropdown-v2">
		                <a href="<?=Url::toRoute(['post/index', 'type' => 'penerbangan', 'id'=>2 ])?>">Tokoh</a>
					</li>

					<li class="dropdown dropdown-v2">
		                	<a href="<?=Url::toRoute(['post/index', 'type' => 'komunitas', 'id'=>3 ])?>">Pakain Adat</a>
					</li>
					
					<li class="dropdown dropdown-v2">
		                <a href="<?=Url::toRoute(['post/index', 'type' => 'penerbangan', 'id'=>4 ])?>">Makanan</a>
					</li>
					<li class="dropdown dropdown-v2">
		                <a href="<?=Url::toRoute(['post/index', 'type' => 'penerbangan', 'id'=>5 ])?>">Minuman</a>
					</li>
					<li class="dropdown dropdown-v2">
		                <a href="<?= Url::toRoute(['post/aboutus']) ?>">About</a>
					</li>

					<li class="pull-right hidden-xs">
						<div class="search-trigger search-trigger2"><i class="fa fa-search"></i>
						</div>
					</li>
				</ul>

			</div>
		</div>
	</header>
	<!-- // HEADER / MENU -->