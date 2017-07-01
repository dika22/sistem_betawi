<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Post;
use common\models\Gallery;
use common\models\Video;
use yii\data\Pagination;
use common\models\PostCategories;
use common\controllers\FrontendAppController;

/**
 * Site controller
 * @author adhika
 * create 17 april 2016
 */
class PostController extends FrontendAppController
{

    public function actionIndex($type, $id)
    {  

 
        $query = Post::find()
                    ->joinWith(['thumbnail', 'category','author0'])
                    ->where(['draft'=>'published','category_id'=>$id])
                    ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                    ->orderBy('post.post_date DESC');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>15]);
        $model = $query->offset($pages->offset)
              ->limit($pages->limit)
              ->asArray()
              ->all();
        $models = $query->offset($pages->offset)
              ->limit($pages->limit)
              ->all();      

        //print_r($models);

        $category =  PostCategories::findOne($id);

        //print_r($category->id);

        if(Yii::$app->request->isAjax){
               
            $this->layout = false;
            $view = '_list';
            $params = [
                      'model' => array_chunk($model, 2),  
                      'pages' => $pages,
                      'category' => $category,
                    ];
        }else{
        
          $view = 'index';
          //$properties = $this->getCatProperties($id);
  
          }

           $recent = Post::find()
                    ->asArray()
                    ->joinWith(['thumbnail', 'category','author0'])
                    ->where(['draft'=>'published'])
                    ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                    ->limit(7)
                    ->orderBy('post_date DESC')
                    ->all();
       
            return $this->render('index',[
                    'model' => array_chunk($model, 2),
                    'pages' => $pages,
                    'category' => $category,
                    'recent' => $recent,
                    'models' => array_chunk($models, 2),


              ]);
            
       

      return $this->render($view, $params);
   }

    public function actionDetail($t , $d)
    {
          $model = Post::findOne($d);

      //print_r($d);
                //->joinWith(['category','author0'])
                //->where(['draft'=>'published','category_id'=>'2']);
        $tags = [];
        $related = [];
        $topic = [];

        if(!empty($model)){

          $model->counter = $model->counter+1;
          $model->save();

            if(trim($model->tags)!=''){
              $tags = explode(',', $model->tags);  
            }
            
            $_related = Post::find()
            ->joinWith(['thumbnail', 'category']);

            foreach($tags as $key => $value){
              if($key==0){
                        //$_related->andWhere(['like', 'post.title', trim($value)]);
                        //$_related->orWhere(['like', 'post.content', trim($value)]);
                $_related->orWhere(['like', 'post.tags', trim($value)]);
              }else{
                        //$_related->orWhere(['like', 'post.title', trim($value)]);
                        //$_related->orWhere(['like', 'post.content', trim($value)]);
                $_related->orWhere(['like', 'post.tags', trim($value)]);
              }
            }

        $related = $_related
        ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
        ->andWhere(['draft'=>'published'])
        ->andWhere(['<>', 'post.id', $d])
        ->orderBy('post.post_date DESC')->limit(3)->all();
        
    }
        $recent = Post::find()
                    ->asArray()
                    ->joinWith(['thumbnail', 'category','author0'])
                    ->where(['draft'=>'published'])
                    ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                    ->limit(7)
                    ->orderBy('post_date DESC')
                    ->all();

        $updatekanal = Post::find()
                ->where(['draft'=>'published','headline_kanal'=>'ya'])
                ->joinWith(['thumbnail','category','author0'])
                ->limit(6)
                ->all(); 
        // $popular = self::getTopArticle(7);
           
         return $this->render('detail',[
                'model'=>$model,
                'updatekanal'=>$updatekanal,
                // 'popular'=>$popular,
                'tags'=>$tags,
                'recent'=>$recent,
            ]);
    }

    public function actionTags($t){
        $tags = explode('-', $t);
        
        $query = Post::find()
                    ->joinWith(['thumbnail', 'category']);

        if(!empty($tags)){
            foreach ($tags as $key => $value) {
                $query->orWhere(['like', 'post.tags', addslashes($value)]);
            }
        }

        $query->andWhere(['draft'=>'published']);
        $query->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>10]);
        
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('post.post_date DESC')
            ->all();

        $tagsRemoveDash = str_replace('-', ' ', $t);
        
        // $rangeArticle = date('Y-m-d H:i:s', strtotime('-'.Yii::$app->params['popularInDays'].' days'));

        $Updatekanal = Post::find()
                ->where(['draft'=>'published','headline_kanal'=>'ya'])
                ->joinWith(['thumbnail','category','author0'])
                ->limit(7)
                ->all(); 
         // $popular = self::getTopArticle(7);
         $recent = Post::find()
                    ->asArray()
                    ->joinWith(['thumbnail', 'category','author0'])
                    ->where(['draft'=>'published'])
                    ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                    ->limit(7)
                    ->orderBy('post_date DESC')
                    ->all();
        
        

    return $this->render('tags', [
        'tags'=>$tagsRemoveDash,
        'Updatekanal'=>$Updatekanal,
        // 'popular'=>$popular,
        'models'=>array_chunk($models, 2),
        'pages' => $pages,
        'recent' => $recent,
        //'otherCatData' => $otherCatData
        ]);
   }

   public function actionAboutus()
   {   
    
       $model = Post::find()
              ->where(['draft'=>'published','headline_kanal'=>'ya'])
              ->joinWith(['thumbnail','category','author0'])
              ->limit(6)
              ->all(); 
      

      // $popular = self::getTopArticle(7);  
      return $this->render('aboutus',[

            'model'=>$model,
            // 'popular'=>$popular, 
        ]);
   }
}
