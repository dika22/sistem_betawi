<?php 

use common\models\Setting;
use frontend\themes\watcher\appassets\MacnificPopupAsset;
MacnificPopupAsset::register($this);
?>

<style type="text/css">
	.white-popup {
	  position: relative;
	  background: #FFF;
	  padding: 0px;
	  width: auto;
	  max-width: 980px;
	  margin: 20px auto;
	}
	.mfp-close-btn-in .mfp-close{
		background: red;
		color:white;
	}
</style>
<div id="site-take-over" class="white-popup mfp-hide">
	<?php 
		echo $this->render('@app/themes/watcher/views/layouts/widget/banner/basic.php', ['zoneid'=>$zoneid]);
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() {

		$.magnificPopup.open({
		  	items: {
		    	src: '#site-take-over',
		    	type: 'inline'
			}
		});

		setInterval(function() {
			$.magnificPopup.close();
		}, 15000);
	});

</script>	