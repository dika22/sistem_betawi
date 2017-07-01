<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\controllers\BackendAppController;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GalleryAlbumCollectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Koleksi Album';

$this->params['breadcrumbs'][] = ['label'=>'Album', 'url'=>Url::to(['gallery-album/index'])];
$this->params['breadcrumbs'][] = $album->title;

$js = Yii::getAlias('@web/js/gallery_album_collection.js');

echo $this->registerJsFile($js, ['position'=>$this::POS_END]);
?>
<div class="gallery-album-collection-index">

    <h1><?= Html::encode('Album : '.$this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="row">
        <div class="col-md-6">
            
            <?= DetailView::widget([
                'model' => $album,
                'attributes' => [
                    'title',
                    'type',
                    'desc',
                    'status',
                    'created_at',
                    'createdBy.username',
                    'modified_at',
                    'modifiedBy.username',
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-9">
                    <?= Html::button(
                        'Browse',
                        ['value' => Url::to(['gallery-album-collection/gallery', 'gallery_album'=>$album->id]),
                            'id' => 'modalButton',
                            'class' => 'btn btn-sm btn-primary'
                        ]) ?>
                    <?php
                    Modal::begin([
                        'id' => 'modal',
                        'header' => 'Gallery',
                        'size' => 'modal-lg',
                        'options' => []
                    ]);

                    echo "<div id='modalContent'></div>";

                    Modal::end();

                    if($album->type=='360_view'){
                        echo Html::a(
                            'Lihat 360 View',
                            Url::to(['gallery-album-collection/rotate-view', 'gallery_album'=>$album->id]), 
                            ['id' => 'modalButton',
                            'class' => 'btn btn-sm btn-info'
                            ]); 
                    }
                    ?>
                </div>
            </div>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'gallery.image',
                        'filter' => false,
                        'format' => 'html',
                        'value' => function($data) {
                            return Html::img(
                                BackendAppController::imageThumb('gallery/'.$data->gallery->image, 100, 0)
                                , ['class'=>'img-thumbnail']
                            );
                        },
                    ],
                    // 'modified_by',
                    // 'created_at',
                    // 'modified_at',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}'
                    ],
                ],
            ]); ?>
        </div>
    </div>


</div>
