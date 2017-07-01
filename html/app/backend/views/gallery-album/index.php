<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GalleryAlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Album Gambar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-album-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Album', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            //'type',
            'desc',
            [
                'attribute' => 'status',
                'filter' => ['draft' => 'draft','publish'=>'publish']
            ],
            //'created_by',
            // 'modified_by',
            // 'created_at',
            // 'modified_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $url = Url::to(['gallery-album-collection/index', 'gallery_album'=>$model->id]);
                        $username = Yii::$app->getUser()->identity->username;
                        $access = false;
                        
                        if(User::isUserAdmin($username))
                            $access = true;
                        else if(User::isUserSuperAdmin($username))
                            $access = true;
                        else if(User::isEditor($username))
                            $access = true;
                        
                        if($model->created_by==Yii::$app->getUser()->id || $access)
                            return Html::a(Html::tag('span', null, ['class'=>'glyphicon glyphicon-eye-open']), $url);
                        else
                            return '';
                        
                        
                    },
                    'update' => function ($url, $model, $key) {
                        $username = Yii::$app->getUser()->identity->username;
                        $access = false;
                        
                        if(User::isUserAdmin($username))
                            $access = true;
                        else if(User::isUserSuperAdmin($username))
                            $access = true;
                        else if(User::isEditor($username))
                            $access = true;
                        
                        if($model->created_by==Yii::$app->getUser()->id || $access)
                            return Html::a(Html::tag('span', null, ['class'=>'glyphicon glyphicon-pencil']), $url);
                        else
                            return '';
                    },
                    'delete' => function ($url, $model, $key) {
                         $username = Yii::$app->getUser()->identity->username;
                        $access = false;
                        
                        if(User::isUserAdmin($username))
                            $access = true;
                        else if(User::isUserSuperAdmin($username))
                            $access = true;
                        else if(User::isEditor($username))
                            $access = true;
                        
                        if($model->created_by==Yii::$app->getUser()->id || $access)
                            return Html::a(Html::tag('span', null, ['class'=>'glyphicon glyphicon-trash']), $url, ['onCLick'=>'return confirm("apakah ada yakin??")']);
                        else
                            return '';
                    }
                ]
            ],
        ],
    ]); ?>

</div>
