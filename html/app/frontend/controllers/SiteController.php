<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Post;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $kanal = Post::find()
                ->joinWith(['thumbnail','category'])
                ->orderBy('post_date DESC')
                ->where(['draft'=>'published','headline_home'=>'ya'])
                ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                ->limit(3)
                ->all();

        $tokoh = Post::find()
                    ->where(['draft'=>'published','category_id'=>'2'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(4)
                    ->all(); 

        $tarian = Post::find()
                    ->where(['draft'=>'published','category_id'=>'1','sub_category'=>'1'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(3)
                    ->all();

         $theater = Post::find()
                    ->where(['draft'=>'published','category_id'=>'1','sub_category'=>'2'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(3)
                    ->all();

         $musik = Post::find()
                    ->where(['draft'=>'published','category_id'=>'1','sub_category'=>'3'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(3)
                    ->all();                        

        //print_r($kesenian);
        //die();

        $adat = Post::find()
                    ->where(['draft'=>'published','category_id'=>'3'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(2)
                    ->all(); 
        $main = Post::find()
                    ->where(['draft'=>'published','category_id'=>'6'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(4)
                    ->all(); 

        $makanan = Post::find()
                    ->where(['draft'=>'published','category_id'=>'4'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(4)
                    ->all(); 
        $minuman = Post::find()
                    ->where(['draft'=>'published','category_id'=>'5'])
                    ->joinWith(['thumbnail','category'])
                    ->orderBy('post_date DESC')
                    ->limit(4)
                    ->all();  
         $recent = Post::find()
                    ->asArray()
                    ->joinWith(['thumbnail', 'category','author0'])
                    ->where(['draft'=>'published'])
                    ->andWhere(['<', 'post.post_date', date('Y-m-d H:i:s')])
                    ->limit(5)
                    ->orderBy('post_date DESC')
                    ->all();           
        return $this->render('index',[
                'kanal'=>$kanal,
                'tarian'=>$tarian,
                'tokoh' => $tokoh,
                'theater'=> $theater,
                'musik'=>$musik,
                'adat'=>$adat,
                'main'=>$main,
                'makanan'=>$makanan,
                'minuman'=>$minuman,
                'recent'=>$recent,


            ]);
    }

}
