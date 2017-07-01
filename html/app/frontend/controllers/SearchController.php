<?php
namespace frontend\controllers;

use Yii;
use common\models\Post;
use common\models\PostCategories;
use yii\data\Pagination;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\controllers\FrontendAppController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
* Site controller
*/
class SearchController extends FrontendAppController
{
   /**
    * @inheritdoc
    */
   public function actions()
   {
       return [
           'error' => [
               'class' => 'yii\web\ErrorAction',
           ],
           'captcha' => [
               'class' => 'yii\captcha\CaptchaAction',
               'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
           ],
       ];
   }

   public function actionError()
   {
       $exception = Yii::$app->errorHandler->exception;
       if ($exception !== null) {
           return $this->render('error', ['exception' => $exception]);
       }
   }
    
  
   public function actionIndex($q){
        
        $search = addslashes($q);
        
        $query = Post::find()
                    ->joinWith(['thumbnail', 'category']);

        if(!empty($search)){
            $query->orWhere(['like', 'post.tags', $q]);
            $query->orWhere(['like', 'post.content', $q]);
            $query->orWhere(['like', 'post.teaser', $q]);
        }

        $query->andWhere(['draft'=>'published']);
        $query->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')]);

        $countQuery = clone $query;
        $count = $countQuery->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize'=>10]);
        
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('post.post_date DESC')
            ->all();
        $latestSecond = array_chunk($models, 2);    
        
       // $rangeArticle = date('Y-m-d H:i:s', strtotime('-'.Yii::$app->params['popularInDays'].' days'));
       // $popular = self::getTopArticle(7);
        
        // $properties = $this->getCatProperties(16);

        
      
        $recent = Post::find()
                    ->asArray()
                    ->joinWith(['thumbnail', 'category','author0'])
                    ->where(['draft'=>'published'])
                    ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                    ->limit(7)
                    ->orderBy('post_date DESC')
                    ->all();

        $model = Post::find()
              ->where(['draft'=>'published','headline_kanal'=>'ya'])
              ->joinWith(['thumbnail','category','author0'])
              ->limit(6)
              ->all(); 

            

    return $this->render('index', [
        'search' => $search,
        'count' => $count,
        // 'properties' => $properties,
        'models'=>$models,
        'pages' => $pages,
        'recent' => $recent,
        // 'popular'=>$popular,
        'model'=>$model,
        ]);
   }




}