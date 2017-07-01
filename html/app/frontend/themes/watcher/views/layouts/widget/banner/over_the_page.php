<?php

use common\models\Setting;
use frontend\themes\newspress\appassets\MacnificPopupAsset;

MacnificPopupAsset::register($this);
?>
<style type="text/css">
	.white-popup {
	  position: relative;
	  background: #FFF;
	  padding: 0px;
	  width: auto;
	  max-width: 600px;
	  margin: 20px auto;
	}
</style>
<div id="over-the-page" class="white-popup mfp-hide">
	<?php 
echo $this->render('@app/themes/newspress/views/layouts/widget/banner/basic.php', ['zoneid'=>$zoneid]);
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$.magnificPopup.open({
			items: {
			    src: '#over-the-page',
			    type: 'inline'
			}
		});

		setInterval(function() {
			$.magnificPopup.close();
		}, 15000);
	});
</script>	