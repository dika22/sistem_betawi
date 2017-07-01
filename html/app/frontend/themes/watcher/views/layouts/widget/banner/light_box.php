<?php

use frontend\themes\newspress\appassets\MacnificPopupAsset;


MacnificPopupAsset::register($this);

?>
<style type="text/css">
	.white-popup {
	  position: relative;
	  background: #FFF;
	  padding: 0px;
	  width: auto;
	  max-width: 1360px;
	  margin: 0px auto;
	}
</style>
<div id="light-box" class="white-popup mfp-hide">
	<?php 
echo $this->render('@app/themes/newspress/views/layouts/widget/banner/basic.php', ['zoneid'=>$zoneid]);
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$.magnificPopup.open({
			preloader: true,
		  	items: {
			    src: '#light-box',
			    type: 'inline'
			}
		});

		setInterval(function() {
			$.magnificPopup.close();
		}, 15000);

	});

</script>