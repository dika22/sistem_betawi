<style type="text/css">
    .site-footer-bottom{padding-bottom:70px}
    @media only screen and (max-width: 767px) {
    .containerDownFrame{
    	bottom:0px}
     }
    .containerDownFrame {
    background: none repeat scroll 0 0;
    height: auto !important;
    left: 0;
    position: fixed;
    right: 0;
    text-align: center;
    bottom: 0px;
    width: 100%;
    z-index: 100;
	}
	.containerDownFrame > div {
    background: none repeat scroll 0 0;
    display: inline-block;
    text-align: center;
    width: 100%;
	}
</style>

<div class="containerDownFrame">
    <div>
    	<?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>$zoneid]);?>
    </div>
</div>