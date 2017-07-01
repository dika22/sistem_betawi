<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\controllers\AppController;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PersonalTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personal Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'name',
            'jabatan',
            [
                'attribute' => 'avatar',
                'filter' => false,
                'format' => 'html',
                'value' => function($data) {
                    return Html::img(
                            AppController::imageThumb('avatar/'.$data->avatar, 100, 0)
                        , ['class'=>'img-thumbnail']
                    );
                },
            ],
            // 'profile:ntext',
            // 'created_at',
            // 'created_by',
            // 'modified_at',
            // 'modified_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
