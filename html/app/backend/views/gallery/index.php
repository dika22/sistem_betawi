<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\controllers\AppController;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gambar';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Single Upload', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Multiple Upload', ['createmultiple'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'credit',
            [
                'attribute' => 'caption',
                'value' => function($data){
                    return substr($data->caption, 0, 100);
                }
            ],
            /*[
                'attribute' => 'fotographer_search',
                'value' => 'photoGrapher.name'
            ],*/
            
            [
                'attribute' => 'image',
                'filter' => false,
                'format' => 'html',
                'value' => function($data) {
                    return Html::img(
                        AppController::imageThumb('gallery/'.$data->image, 100, 0)
                        , ['class'=>'img-thumbnail']
                    );
                },
            ],
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
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
                ],
            ],
            
        ],
    ]); ?>

</div>
