<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use common\controllers\FrontendAppController;
use common\models\User;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'category_id',
             [
                'attribute' => 'category_id',
                'value' => 'category.name',
                'filter' => yii\helpers\ArrayHelper::map(
                                common\models\PostCategories::find()
                                ->asArray()->all(), 
                                'id',
                                'name'
                            ),
                'options' => [
                    'width' => '100px'
                ]
            ],
            'title',
            [
                'attribute' => 'author',
                'value' => 'author0.name',
                'filter' => yii\helpers\ArrayHelper::map(
                                common\models\PersonalTeam::find()
                                ->asArray()->all(), 
                                'id',
                                'name'
                            )
            ],
            //'content:ntext',
             'post_date',
            [
                'attribute' => 'counter',
                'options'=>[
                    'width' => '50px'
                ]
            ],
            [
                'attribute' => 'draft',
                'filter' => ['draft' => 'draft','published'=>'published']
            ],
            //'image',
            // 'teaser',
            // 'tags',
            // 'author',
            // 'editor',
            // 'keyword',
           
            // 'featured',
            // 'modified_at',
            // 'created_by',
            // 'created_at',
            // 'modified_by',
            
            // 'draft',
            // 'headline_home',
            // 'headline_kanal',
            // 'gallery_album_id',
            // 'video_album_id',
            // 'advertorial',
            // 'adv_start_date',
            // 'adv_end_date',
            // 'topic',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'options' => [
                    'width' => '70px'
                ],
                'buttons' => [
                    'view' => function ($url, $model, $key){
                        $groupSlug = FrontendAppController::slugify($model['category']['name']);
                        $titleSlug = FrontendAppController::slugify($model['title']);
                        $articleUrl = Url::toRoute(['../post/detail', 'type'=>$groupSlug,'t'=>$titleSlug, 'd'=>$model['id'], 'asdasweeoiuouisadtaytduasd'=>rand(0, 99)]);
                        return Html::a(Html::tag('span', null, ['class'=>'glyphicon glyphicon-eye-open']), $articleUrl, ['target'=>'_blank']);
                        
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
                            return Html::a(Html::tag('span', null, ['class'=>'glyphicon glyphicon-trash']), $url);
                        else
                            return '';
                    }
                ],
            ],
        ],
    ]); ?>
</div>
