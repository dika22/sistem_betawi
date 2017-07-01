<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
use common\models\Gallery;
use yii\widgets\LinkPager;




// $this->title = Yii::$app->params['comonTitle'];
?>
<!-- PAGE HEADER -->
    
    <!-- // PAGE HEADER -->
    <!-- CATEGORY -->
    <div class="container padding-bottom-30">
    <div class="clearfix">&nbsp;</div>
        <div class="row">
            <div class="col-md-8 col-sm-7 more-posts padding-bottom-30">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tags : #<?=$tags?></h2>
                    </div>
                    <?php foreach ($models as $key => $values) : ?>
                        <div class="clearfix">&nbsp;</div>
                            <?php if(empty($models)):?>
                                <h2>Nothing Found</h2>
                                <h4>Sorry, but nothing matched your search terms. Please try again with some different keywords.</h4>
                            <?php endif;?>

                    <?php
                        foreach ($values as $key => $valueNext) :   
                        $image =  Gallery::findOne($valueNext['image']);    
                        $imageThumb = FrontendAppController::imageThumb('gallery/'.$image['image'],265, 150);
                        //$title = $valueNext->title;
                        $groupSlug = FrontendAppController::slugify($valueNext['category']['name']);
                        $titleSlug = FrontendAppController::slugify($valueNext['title']);
                        $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valueNext['category']['id']]);
                        $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$valueNext['id']]);
                                    
                                            ?>
                    <div class="col-md-6 col-sm-6">
                        <div class="layout_3--item border">
                            <div class="thumb">
                                <div class="icon-24 video2"></div>
                                <a href="<?= $articleUrl; ?>"><img src="<?= $imageThumb; ?>" alt=""/></a>
                            </div>
                            <span class="cat"><?= $valueNext['category']['name']; ?></span>
                            <h4><a href="<?= $articleUrl; ?>"><?= $valueNext['title']; ?></a></h4>
                            <p><?=  $valueNext['teaser']; ?></p>
                            <div class="meta"><span class="author"><?= $valueNext['author0']['name'] ?></span><span class="date"><?= date('Y F d', strtotime($valueNext['post_date'])) ?></span></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </div>
                <hr class="l3 hidden-xs">
                <!-- PAGINATION -->
                <ul class="pagination">
                    <li><?php
                            echo LinkPager::widget([
                            'pagination' => $pages,
                            'linkOptions' => ['class' => '']
                        ]);?>
                    </li>
                </ul>
            </div>
            <!-- // CATEGORY -->

            <!-- SIDEBAR -->
            <aside class="col-md-4 col-sm-4">
                <div class="side-widget margin-bottom-50">
                    <div class="ads ad-300">
                    <?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>'310'])?>
                    </div>
                </div>          
                <div class="side-widget margin-bottom-50">
                    <div class="ads ad-300">
                    <?=$this->render('@app/themes/watcher/views/layouts/banner.php', ['zoneid'=>'311'])?>
                    </div>
                </div>
                <div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Trending</span></h3>

                    <div class="trending-box">
                        <ul class="trending padding-bottom-30">
                        
                    </ul>     
                    </div>
                </div>
                <div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Featured Posts</span></h3>
                    <ul class="trending padding-bottom-30">
                    <?php foreach ($recent as $key => $Rvalue):
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
    <!-- // CONTENT -->