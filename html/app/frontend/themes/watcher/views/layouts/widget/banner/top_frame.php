<style type="text/css">
    .body{padding-top:106px}
    @media only screen and (max-width: 767px) {
       	.body{
        	padding-top:20px
       	}
    }
    .wrapper{
    	margin-top:70px;
    }
.containerTopFrame {
    background: white none repeat scroll 0 0;
    height: 0;
    left: 0;
    position: fixed;
    right: 0;
    text-align: center;
    top: 0;
    width: 100%;
    z-index: 99;
    margin-bottom: 80px;
}
</style>

<div class="containerTopFrame text-center">
 <div>
  	<?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>$zoneid, 'n'=>'adfc7089']);?>
  	</div>
</div>