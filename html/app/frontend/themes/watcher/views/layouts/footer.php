	<?php
	use yii\helpers\Url;
	?>
	
	<!-- FOOTER -->
	<footer class="bg-dark footer1 padding-top-60">
		<div class="container">
			<div class="row margin-bottom-30">
				<div class="col-md-4 col-sm-6">
						<p class="p-foot">&copy; Copyright 2017</p>
					</div>
					<div class="col-md-8 col-sm-6 about">
						<ul class="footer-links">
							<li><a href="<?= Url::toRoute(['static/aboutus']) ?>">About Us</a></li>
							<li><a href="<?= Url::toRoute(['static/redaksi']) ?>">Contact Us</a></li>
							<li><a href="<?= Url::toRoute(['static/aboutus']) ?>">Terms of Use</a></li>
							<li><a href="<?= Url::toRoute(['static/pedomanmediasiber']) ?>">Privacy Policy</a></li>
						</ul>
					</div>
			</div>
		</div>
	</footer>
	<!-- // FOOTER -->