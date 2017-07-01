<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\controllers\OtoBackendAppController;
/* @var $this yii\web\View */
/* @var $searchModel common\models\GalleryAlbumCollectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Koleksi Album';

$this->params['breadcrumbs'][] = ['label'=>'Album', 'url'=>Url::to(['gallery-album/index'])];
$this->params['breadcrumbs'][] = ['label'=>$album->title, 'url'=>Url::to(['gallery-album-collection/index', 'gallery_album'=>$album->id])];
$this->params['breadcrumbs'][] = '360 View';

$js = Yii::getAlias('@web/fatlab/js/360v.js');

echo $this->registerJsFile($js, ['position'=>$this::POS_END]);
?>
<div class="gallery-album-collection-index">

    <h1>360&deg; View </h1>
    
    <div class="row">
        <div class="col-md-6">
        	<ul class="360_view">
        		<?php foreach($collection as $key=>$value):
        			//print_r($value);die;
        			$thumbnail = Html::img(
                                OtoBackendAppController::imageThumb('gallery/'.$value['gallery']['image'], 500, 400)
                            );
        		?>
				<li><?=$thumbnail?></li>
				<?php endforeach;?>
			</ul>
        </div>
    </div>
</div>