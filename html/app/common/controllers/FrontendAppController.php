<?php
/**
 * Created by PhpStorm.
 * User: adhika
 * Date: 1/23/15
 * Time: 7:13 PM
 */

namespace common\controllers;

use common\models\User;
use Yii;
use common\models\DPostBannerZone;

class FrontendAppController extends AppController{

    public $logedUser;

    function __construct( $id, $module, $config = [] ){

        if (\Yii::$app->user->isGuest) {
            //return $this->goHome();
        }
        
        return parent::__construct($id, $module, $config);
    }

    protected function ajaxRequired(){
    	if(!Yii::$app->request->isAjax)
    		throw new \yii\web\HttpException(403, 'Bad params');
    }
    
     public static function removeQuotes($string){
        $str = str_replace('"', "", $string);
        $str = str_replace("'", "", $string);
        return $str;
    }

    public static function getCatClass($cat){
        
        $slug = self::slugify($cat);
        
        switch ($slug){
            case 'berita': return 'cat-news';break;
            case 'bisnis': return 'cat-lifestyle';break;
            
            default: return 'cat-news';                break;
        }
    }
    
    public static function getTopArticle($limit=5){
        
        $rangeArticle = date('Y-m-d H:i:s', strtotime('-'.Yii::$app->params['popularInDays'].' days'));

        $data = \common\models\Post::find()
                     ->asArray()
                     ->joinWith(['thumbnail', 'category'])
                     ->where(['draft'=>'published'])
                     ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                     ->andWhere(['between', 'post.post_date', $rangeArticle, date('Y-m-d H:i:s')])            
                     ->limit($limit)
                     ->orderBy('post.counter DESC')
                     ->all();
        return $data;
    }

    public static function getBannerZone($cat){
        $bannerList = [];
        $bannerZone = DPostBannerZone::find()
            //->where(['d_post_category_id'=>$cat, 'status'=>'aktif'])
            ->where(['status'=>'aktif'])
            ->all();
        
        foreach ($bannerZone as $key => $value) {
            $bannerList[$value['code']] = $value['zone'];
        }

        return $bannerList;
    }

    public static function getBrandList(){
         $_brand = \common\models\CarBrand::find()
                ->orderBy('name ASC')
                ->asArray()
                ->all();
        
        $brand = [];
        foreach($_brand as $key=>$value){
        $count = \common\models\CarTypeSub::find()
                    ->where(
                        [
                            'car_brand_id'=>$value['id'],
                            'status' => 'published'
                        ])
                    ->count();
            
            if($count>0){
                $brand[$key] = $value;
            }
        }
        return $brand;
    }

}
