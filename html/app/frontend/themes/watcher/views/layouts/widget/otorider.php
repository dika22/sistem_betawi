<?php 
use common\controllers\FrontendAppController;
$thumbnailLoading = FrontendAppController::imageThumb('otodrivercom.png', 100, 80);
?>

<!-- start:section-module-news -->
<section class="module-news top-margin">
    <!-- start:header -->
    <header>
        <h2>
            <a href="http://otorider.com" target="_blank">
                <img src="http://otorider.com/image/load/100/0/logo/logo_md.png"/>
            </a>
        </h2>
        <span class="borderline"></span>
    </header>
    <!-- end:header -->
    <!-- start:article-container -->
    <div class="article-container" id='orContainer'></div>
    <!-- end:article-container -->
</section>
<!-- end:section-module-news -->

<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            url: "http://otorider.com/rss/newsj?callback=?",
            dataType : 'JSONP',
            success : function(data){
                var obj = jQuery.parseJSON(data);
                $(obj).each(function(index, value){
                    var html = '<article class="clearfix">';
                            html += '<a href="'+value.link+'" target="_blank"><img data-src="'+value.thumbnail+'" src="images/dummy/100x80_2.jpg" width="100" height="80" alt="'+value.title+'" class="lazyload" /></a>';
                            html += '<h3><a href="'+value.link+'" target="_blank">'+value.title+'</a></h3>';
                        html += '</article>';

                     $('#orContainer').append(html);
                });
            }
        });
    })
</script>