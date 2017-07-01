<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\BackendAppController;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">Search</div>
            <input type="text" value="<?=Yii::$app->getRequest()->getQueryParam('s')?>" placeholder="Search" id="searchGallery" class="form-control">
        </div>
    </div>

<input type="hidden" placeholder="Search" value="<?=Url::to('gallery')?>" id="formGallery" class="form-control">
<div class="gallery-index">
    <?php
    foreach ($models as $key=>$value) {
        $path = 'gallery/'.$value->image;
        $thinImageUrl = BackendAppController::imageThumb($path, 100, 0);
        $originalImage = BackendAppController::imageThumb($path, 0, 0);
        $smallImage = BackendAppController::imageThumb($path, 200, 0);
        $mediumImage = BackendAppController::imageThumb($path, 400, 0);
        $largeImage = BackendAppController::imageThumb($path, 800, 0);
    ?>
        <div class="col-lg-3" style="height:250px">
            <a href="#" class="thumbnail">
                <img alt="<?php echo $value->title?>" src="<?php echo BackendAppController::imageThumb($path, 200, 133);; ?>" >
            </a>
            <div class="caption">
                <p>
                    <?php echo substr($value->title, 0, 30)?>
                    <br/>
                    Credit : <?php echo $value->credit?>
                    <br/>
                    Created : <?php echo $value->created_at?>
                    <!-- Single button -->
                    <a href="javascript:void(0)" class="insert-image btn btn-default btn-xs" data-id="<?php echo $value->id?>" data-url="<?php echo Url::to(['gallery-album-collection/create', 'gallery_id'=>$value->id, 'album_id'=>$album_id])?>">
                        Tambah
                    </a>
                    
                </p>
            </div>
            <div class="clearfix">&nbsp;</div>
        </div>
    <?php
    }
    ?><div class="clearfix">&nbsp;</div>
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>
