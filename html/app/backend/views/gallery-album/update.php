<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryAlbum */

$this->title = 'Update Album Gambar: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Album Gambar', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
	'label' => $model->title, 
	'url' => [
		'gallery-album-collection/index', 'gallery_album' => $model->id
		]
	];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
