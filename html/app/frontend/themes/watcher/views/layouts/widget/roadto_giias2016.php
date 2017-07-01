<?php 

use common\controllers\OtoFrontendAppController;
use common\models\Post;
use yii\helpers\Url;

$latest = Post::find()
                    ->asArray()
                    ->joinWith(['thumbnail', 'category'])
                    ->where(['draft'=>'published', 'topic'=>'GIIAS 2016'])
                    ->andWhere(['<', 'd_post.post_date', date('Y-m-d H:i:s')])
                    ->limit(8)
                    ->orderBy('post_date DESC')
                    ->all();
?>

<!-- start:section-module-timeline -->
<section class="module-timeline">
    <!-- start:header -->
    <header>
        <h2>Road to GIIAS 2016</h2>
        <span class="borderline"></span>
    </header>
    <!-- end:header -->
    <!-- start:articles -->
    <div class="articles">
    <?php foreach($latest as $key=>$value):

        $thumb = OtoFrontendAppController::imageThumb('otodrivercom.png', 560, 390);
        if(!empty($values[0]['thumbnail'])){
            $imageUrl = OtoFrontendAppController::imageThumb('gallery/' . $value['thumbnail']['image'], 560, 390);
        }else{
            $imageUrl = $thumb;
        }

        $groupSlug = OtoFrontendAppController::slugify($value['category']['name']);
        $groupUrl = Url::toRoute(['post/index', 'type'=>$groupSlug, 'id'=>$value['category']['id']]);

        $encrypt = OtoFrontendAppController::encrypt($value['id']);
        $titleSlug = OtoFrontendAppController::slugify($value['title']);
        $articleUrl = Url::toRoute(['post/view', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$value['id']]);


    ?>
        <article>
            <span class="published"><?= date('d M Y', strtotime($value['post_date'])) ?></span>
            <div class="cnt">
                <i class="bullet  bullet-sports"></i>
                <span class="category cat-sports"><a href="<?=$groupUrl?>" alt="<?=$value['title']?>"><?=$value['category']['name']?></a></span>
                <h3><a href="<?=$articleUrl?>"  alt="<?=$value['title']?>"><?=$value['title']?></a></h3>
            </div>
        </article>
    <?php endforeach?>
    </div>
    <!-- end:articles -->
</section>
<!-- end:section-module-timeline -->