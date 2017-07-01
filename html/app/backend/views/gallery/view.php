<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\controllers\AppController;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Gambar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if($model->created_by==Yii::$app->getUser()->id || Yii::$app->getUser()->identity->role==User::getConstant('ROLE_SUPER_ADMIN') || Yii::$app->getUser()->identity->role==User::getConstant('ROLE_ADMIN')){?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php }?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'credit',
            'caption',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value'=>  Html::img(
                        AppController::imageThumb('gallery/'.$model->image, 100, 0)
                    , ['class'=>'img-thumbnail']
                )

            ],
            'extension',
            'base_name',
            'created_at',
            [
                'attribute' => 'created_by',
                'value' => $model->createdBy->username
            ],
            'modified_at',
            [
                'attribute' => 'modified_by',
                'value' => (isset($model->modifiedBy->username)) ? $model->modifiedBy->username : ''
            ],
        ],
    ]) ?>

</div>
