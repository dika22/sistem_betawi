<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\FrontendAppController;
use common\models\Gallery;
/* @var $this yii\web\View */
//SEO
?>
<div class="container padding-top-30 padding-bottom-50">
        <div class="post-carousel-wrap post-carousel-wrap3">
            <div class="post-carousel3">
            <?php foreach ($kanal as $key => $value):
                $image =  Gallery::findOne($value['image']);
                $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],400,180);
                $groupSlug = FrontendAppController::slugify($value['category']['name']);
                $titleSlug = FrontendAppController::slugify($value['title']);
                $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$value['id']]);
                $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$value['category']['id']]);
            ?>
                <div class="layout_1--item">
                    <a href="<?= $articleUrl ?>">
                        <div class="overlay-alt"></div>
                        <img src=" <?= $imageThumb ?>" width="100%" class="img-responsive ">
                        <div class="layout-detail padding-25">
                            <span class="badge text-uppercase badge-overlay badge-lifestyle"><?= $value['category']['name'];?></span>
                            <h4><?php echo $value['title']; ?></h4>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
            <a class="prev prev4"><i class="fa fa-angle-left"></i></a>
            <a class="next next4"><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    
    <div class="container">
        <!-- kesenian -->
        <div class="padding-top-30 padding-bottom-30">
            <div class="layout_3">
                <div class="row">
                    <div class="col-md-4 col-sm-4 margin-bottom-30">
                        <h3 class="heading-1"><span>Tarian</span></h3>
                        <?php
                            $image =  Gallery::findOne($tarian[0]['image']);    
                            $imageThumb=FrontendAppController::imageThumb('gallery/'.$image['image'],711,400);
                            $thumb = FrontendAppController::imageThumb('otodrivercom.png', 265, 149);
                            if (!empty($imageThumb)) {
                                $imageThumb;
                                }else{
                                     $thumb;
                                }
                                $title = $tarian[0]['title'];
                                //$teaser = $model[0]->teaser;
                                //$articleUrl = Url::to(['detail/'.$value['id']]);
                                $groupSlug = FrontendAppController::slugify($tarian[0]['category']['name']);
                                $titleSlug = FrontendAppController::slugify($tarian[0]['title']);
                                $articleUrl= Url::toRoute(['post/detail','type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$tarian[0]['id']]);
                                $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$tarian[0]['category']['id']]);
                        ?>
                            <div class="layout_3--item">
                                <div class="thumb">
                                    <a href="./post_page_01.html">
                                    <img src=" <?= $imageThumb ?>" width="100%" class="img-responsive ">
                                    </a>
                                </div>
                                <h4><a href="<?= $articleUrl ?>"><?= $title; ?></a></h4>
                                <p><?php echo $tarian[0]['teaser']; ?></p>
                                <div class="meta"><span class="author"><?php echo $tarian[0]['author0']['name']; ?></span>
                                <span class="date">
                                <?php echo date('d F Y',strtotime($tarian[0]['post_date'])); ?> 
                                </span>
                                </div>
                            </div>

                            <?php foreach ($tarian as $key => $valTar):
                                    $image =  Gallery::findOne($valTar['image']);
                                    $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                                    $groupSlug = FrontendAppController::slugify($valTar['category']['name']);
                                    $titleSlug = FrontendAppController::slugify($valTar['title']);
                                    $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valTar['id']]);
                                    $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valTar['category']['id']]);
                                ?>
                            <div class="layout_2--item row">
                                <div class="col-md-6">
                                    <div class="thumb">
                                        <div class="icon-24 video2"></div>
                                        <a href="<?= $articleUrl ?>"><img src="<?= $imageThumb ?>" class="img-responsive" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4><a href="<?= $articleUrl ?>"><?php echo $valTar['title']; ?></a></h4>
                                    <div class="meta">
                                        <span class="date"><?php echo date('d F Y',strtotime($valTar['post_date'])); ?></span>
                                    </div>
                                </div>
                                </div>
                                 <hr class="l2">
                                <?php endforeach ?>
                            
                            <div class="margin-bottom-30"></div>
                        </div>
                        <div class="col-md-4 col-sm-4 margin-bottom-30">
                            <h3 class="heading-1"><span>Theater</span></h3>
                        <?php
                            $image =  Gallery::findOne($theater[0]['image']);    
                            $imageThumb=FrontendAppController::imageThumb('gallery/'.$image['image'],711,400);
                            $thumb = FrontendAppController::imageThumb('otodrivercom.png', 265, 149);
                            if (!empty($imageThumb)) {
                            $imageThumb;
                            }else{
                                 $thumb;
                            }
                            $title = $theater[0]['title'];
                            //$teaser = $model[0]->teaser;
                            //$articleUrl = Url::to(['detail/'.$value['id']]);
                            $groupSlug = FrontendAppController::slugify($theater[0]['category']['name']);
                            $titleSlug = FrontendAppController::slugify($theater[0]['title']);
                            $articleUrl= Url::toRoute(['post/detail','type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$theater[0]['id']]);
                            $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$theater[0]['category']['id']]);
                        ?>
                            <div class="layout_3--item">
                                <div class="thumb">
                                    <a href="./post_page_01.html">
                                        <img src=" <?= $imageThumb ?>" width="100%" class="img-responsive ">
                                    </a>
                                </div>
                                <h4><a href="<?= $articleUrl ?>"><?= $title; ?></a></h4>
                                <p><?php echo $theater[0]['teaser']; ?></p>
                                <div class="meta"><span class="author"><?php echo $theater[0]['author0']['name']; ?></span>
                                <span class="date">
                                <?php echo date('d F Y',strtotime($theater[0]['post_date'])); ?></span></div>
                            </div>
                            <?php foreach ($theater as $key => $valTe):
                                    $image =  Gallery::findOne($valTe['image']);
                                    $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                                    $groupSlug = FrontendAppController::slugify($valTe['category']['name']);
                                    $titleSlug = FrontendAppController::slugify($valTe['title']);
                                    $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valTe['id']]);
                                    $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valTe['category']['id']]);
                            ?>
                            <div class="layout_2--item row">
                                <div class="col-md-6">
                                    <div class="thumb">
                                        <div class="icon-24 video2"></div>
                                        <a href="./post_page_01.html"><img src="<?= $imageThumb ?>" class="img-responsive" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4><a href="<?= $articleUrl ?>"><?php echo $valTe['title']; ?></a></h4>
                                    <div class="meta"><span class="date"><?php echo date('d F Y',strtotime($valTe['post_date'])); ?></span></div>
                                </div>
                            </div>
                             <hr class="l2">
                            <?php endforeach ?>
                            <div class="margin-bottom-30"></div>
                        </div>
                        <div class="col-md-4 col-sm-4 margin-bottom-30">
                            <h3 class="heading-1"><span>Musik</span></h3>
                        <?php
                             $image =  Gallery::findOne($musik[0]['image']);    
                            $imageThumb=FrontendAppController::imageThumb('gallery/'.$image['image'],711,400);
                            $thumb = FrontendAppController::imageThumb('otodrivercom.png', 265, 149);
                            if (!empty($imageThumb)) {
                            $imageThumb;
                            }else{
                                 $thumb;
                            }
                            $title = $musik[0]['title'];
                            //$teaser = $model[0]->teaser;
                            //$articleUrl = Url::to(['detail/'.$value['id']]);
                            $groupSlug = FrontendAppController::slugify($musik[0]['category']['name']);
                            $titleSlug = FrontendAppController::slugify($musik[0]['title']);
                            $articleUrl= Url::toRoute(['post/detail','type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$musik[0]['id']]);
                            $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$musik[0]['category']['id']]);
                        ?>
                            <div class="layout_3--item">
                                <div class="thumb">
                                    <a href="./post_page_01.html">
                                    <img src=" <?= $imageThumb ?>" width="100%" class="img-responsive ">
                                    </a>
                                </div>
                                <h4><a href="<?= $articleUrl ?>"><?= $title ?></a></h4>
                                <p><?php echo $musik[0]['title']; ?></p>
                                <div class="meta"><span class="author"><?php echo $musik[0]['author0']['name']; ?></span>
                                <span class="date"><?php echo date('d F Y',strtotime($musik[0]['post_date'])); ?></span>
                                </div>
                            </div>
                            <div class="layout_2--item row">
                            <?php foreach ($musik as $key => $valMu):
                                    $image =  Gallery::findOne($valMu['image']);
                                    $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                                    $groupSlug = FrontendAppController::slugify($valMu['category']['name']);
                                    $titleSlug = FrontendAppController::slugify($valMu['title']);
                                    $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valMu['id']]);
                                    $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valMu['category']['id']]);
                                ?>
                                <div class="col-md-6">
                                    <div class="thumb">
                                        <a href="./post_page_01.html"><img src="<?= $imageThumb ?>" class="img-responsive" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4><a href="<?= $articleUrl ?>"><?= $titleSlug ?></a></h4>
                                    <div class="meta">
                                    <span class="date">
                                        <?php echo date('d F Y',strtotime($valMu['post_date'])); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr class="l2">
                        <?php endforeach ?>
                            <div class="margin-bottom-30"></div>
                        </div>
                    </div>
            </div>          
        <!-- tokoh -->
        <div class="padding-top-30 padding-bottom-30">
                <h3 class="heading-1"><span>Tokoh</span></h3>           
                <div class="row">
                <?php foreach ($tokoh as $key => $valTok):
                    $image =  Gallery::findOne($valTok['image']);
                    $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                    $groupSlug = FrontendAppController::slugify($valTok['category']['name']);
                    $titleSlug = FrontendAppController::slugify($valTok['title']);
                    $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valTok['id']]);
                    $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valTok['category']['id']]);
                ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="layout_2--item">
                            <div class="thumb">
                                <a href="./post_page_01.html">
                                    <img src=" <?= $imageThumb ?>" width="100%" class="img-responsive ">
                                </a>
                            </div>
                            <h4><a href="<?= $articleUrl; ?>"><?php echo $valTok['title']; ?></a></h4>
                            <div class="meta"><span class="author"><?php echo $valTok['author0']['name']; ?></span><span class="date">
                                <?php echo date('d F Y',strtotime($valTok['post_date'])); ?>
                            </span></div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>          
            </div>
            <div class="col-md-8">
                <h3 class="heading-1"><span>Pakain adat</span></h3>   
                <?php foreach ($adat as $key => $valadat):
                    $image =  Gallery::findOne($valadat['image']);
                    $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                    $groupSlug = FrontendAppController::slugify($valadat['category']['name']);
                    $titleSlug = FrontendAppController::slugify($valadat['title']);
                    $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valadat['id']]);
                    $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valadat['category']['id']]);
                ?>      
                <div class="row margin-bottom-40">
                    <div class="layout_3--item">
                        <div class="col-md-6">
                            <div class="thumb">
                                <a href="./post_page_01.html">
                                <img src="<?= $imageThumb ?>" width="100%" class="img-responsive ">
                                <img src="" class="img-responsive" alt=""></a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4><a href="<?= $articleUrl ?>"><?php echo $valadat['title']; ?></a></h4>
                            <p><?php echo $valadat['teaser']; ?></p>
                            <div class="meta"><span class="author"><?php echo $valadat['author0']['name']; ?></span><span class="date"><?php echo date('d F Y',strtotime($valadat['post_date'])); ?></span></div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            <h3 class="heading-1"><span>Permainan</span></h3>           
                <div class="row">
                <?php foreach ($main as $key => $valmain):
                    $image =  Gallery::findOne($valmain['image']);
                    $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                    $groupSlug = FrontendAppController::slugify($valmain['category']['name']);
                    $titleSlug = FrontendAppController::slugify($valmain['title']);
                    $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valmain['id']]);
                    $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valmain['category']['id']]);
                ?>  
                    <div class="col-md-6 col-sm-6 margin-bottom-30">
                        <div class="layout_3--item">
                            <div class="thumb">
                                <a href="#">
                                    <img src=" <?= $imageThumb ?>" width="100%" class="img-responsive ">
                                <img src="" class="img-responsive" alt="">
                                </a>
                            </div>
                            <h4><a href="<?= $articleUrl ?>"><?php echo $valmain['title']; ?></a></h4>
                            <p><?php echo $valmain['teaser']; ?></p>
                            <div class="meta"><span class="author"><?php echo $valmain['author0']['name']; ?></span><span class="date"><?php echo date('d F Y',strtotime($valadat['post_date'])); ?></span></div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>              
                <div class="layout_3">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 margin-bottom-30">
                            <h3 class="heading-1"><span>Makanan</span></h3>
                    <?php
                        $image =  Gallery::findOne($makanan[0]['image']);    
                        $imageThumb=FrontendAppController::imageThumb('gallery/'.$image['image'],711,400);
                        $thumb = FrontendAppController::imageThumb('otodrivercom.png', 265, 149);
                        if (!empty($imageThumb)) {
                            $imageThumb;
                            }else{
                                 $thumb;
                            }
                            $title = $makanan[0]['title'];
                            $teaser = $makanan[0]->teaser;
                            $articleUrl = Url::to(['detail/'.$value['id']]);
                            $groupSlug = FrontendAppController::slugify($makanan[0]['category']['name']);
                            $titleSlug = FrontendAppController::slugify($makanan[0]['title']);
                            //$articleUrl= Url::toRoute(['post/detail','type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$makanan['id']]);
                            $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$makanan[0]['category']['id']]);
                    ?>
                    <div class="layout_3--item">
                        <div class="thumb">
                            <a href="./post_page_01.html">
                                <img src=" <?= $imageThumb?>" width="100%" class="img-responsive ">
                            </a>
                                </div>
                                <h4><a href="<?= $articleUrl; ?>"><?php echo $makanan[0]['title']; ?></a></h4>
                                <p><?php echo $makanan[0]['teaser']; ?></p>
                                <div class="meta"><span class="author"><?php echo $makanan[0]['author0']['name']; ?></span><span class="date"><?php echo date('d F Y',strtotime($makanan[0]['post_date'])); ?></span></div>
                            </div>
                            <?php 
                            unset($makanan[0]);
                            foreach ($makanan as $key => $valm):
                                $image =  Gallery::findOne($valm['image']);
                                $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                                $groupSlug = FrontendAppController::slugify($valm['category']['name']);
                                $titleSlug = FrontendAppController::slugify($valm['title']);
                                $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valm['id']]);
                                $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valm['category']['id']]);
                            ?>
                            <div class="layout_2--item row">
                                <div class="col-md-6">
                                    <div class="thumb">
                                        <div class="icon-24 video2"></div>
                                        <a href="./post_page_01.html"><img src="<?= $imageThumb ?>" class="img-responsive" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4><a href="#"><?php echo $valm['title']; ?></a></h4>
                                    <div class="meta"><span class="date"><?php echo date('d F Y',strtotime($valm['post_date'])); ?></span></div>
                                </div>
                            </div>
                            <hr class="l2">
                            <?php endforeach ?>
                        </div>
                        <div class="col-md-6 col-sm-6 margin-bottom-30">
                            <h3 class="heading-1"><span>Minuman</span></h3>
                    <?php
                        $image =  Gallery::findOne($minuman[0]['image']);    
                        $imageThumb=FrontendAppController::imageThumb('gallery/'.$image['image'],711,400);
                        $thumb = FrontendAppController::imageThumb('otodrivercom.png', 265, 149);
                        if (!empty($imageThumb)) {
                            $imageThumb;
                            }else{
                                 $thumb;
                            }
                            $title = $minuman[0]['title'];
                            $teaser = $minuman[0]->teaser;
                            $articleUrl = Url::to(['detail/'.$value['id']]);
                            $groupSlug = FrontendAppController::slugify($minuman[0]['category']['name']);
                            $titleSlug = FrontendAppController::slugify($minuman[0]['title']);
                            //$articleUrl= Url::toRoute(['post/detail','type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$minuman['id']]);
                            $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$minuman[0]['category']['id']]);
                    ?>
                            <div class="layout_3--item">
                                <div class="thumb">
                                    <a href="./post_page_01.html">
                                    <img src=" <?= $imageThumb?>" width="100%" class="img-responsive ">
                                    </a>
                                </div>
                                <h4><a href="<?= $articleUrl ?>"><?php echo $minuman[0]['title']; ?></a></h4>
                                <p><?php echo $valadat['teaser']; ?></p>
                                <div class="meta"><span class="author"><?php echo $minuman[0]['author0']['name']; ?></span>
                                <span class="date"><?php echo date('d F Y',strtotime($minuman[0]['post_date'])); ?></span>
                                </div>
                            </div>
                            <?php foreach ($minuman as $key => $valmin):
                                $image =  Gallery::findOne($valmin['image']);
                                $imageThumb =  FrontendAppController::imageThumb('gallery/'.$image['image'],355, 200);
                                $groupSlug = FrontendAppController::slugify($valmin['category']['name']);
                                $titleSlug = FrontendAppController::slugify($valmin['title']);
                                $articleUrl = Url::toRoute(['post/detail', 'type'=>$groupSlug,'t'=>$titleSlug,'d'=>$valmin['id']]);
                                $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$valmin['category']['id']]);
                            ?> 
                            <div class="layout_2--item row">
                                <div class="col-md-6">
                                    <div class="thumb">
                                        <a href="./post_page_01.html"><img src="<?= $imageThumb ?>" class="img-responsive" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4><a href="<?= $articleUrl ?>"><?php echo $valmin['title']; ?></a></h4>
                                    <div class="meta"><span class="date"><?php echo date('d F Y',strtotime($valmin['post_date'])); ?></span></div>
                                </div>
                            </div>
                            <hr class="l2">
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>          
        </div>
        <aside class="col-md-4">
            <div class="side-widget margin-bottom-30">
                    <h3 class="heading-1"><span>Terbaru</span></h3>
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
    </div>
    </div>