<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use common\models\PostSearch;
use common\controllers\BackendAppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use common\models\PersonalTeam;
use yii\helpers\Json;
use common\models\Gallery;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends BackendAppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionGalleryadd(){
        $this->layout = 'blank';
        $model = new Gallery();

        $model->scenario = 'create';

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->upload = UploadedFile::getInstance($model, 'upload');
            $model->extension = $model->upload->extension;
            $model->base_name = $model->upload->baseName;
            $model->image = $this->slugify($model->base_name).rand(0, 5000).'.'.$model->extension;
            $model->created_by =Yii::$app->user->id;
            if ($model->upload && $model->validate()) {
                $path = Yii::getAlias('@image');
                if($model->save()){
                    $model->upload->saveAs($path . DIRECTORY_SEPARATOR .'gallery' . DIRECTORY_SEPARATOR . $model->image);
                    \Yii::$app->getSession()->setFlash('success', 'Berhasil Upload');

                    return $this->redirect(['post/galleryadd']);
                }
            }
        }


        $personalTeam = PersonalTeam::find()->all();

        return $this->render('galleryadd', [
            'model' => $model,
            'personalTeam' => $personalTeam
        ]);
    }


    public function actionGallery(){
        $this->layout = false;

        $s = Yii::$app->getRequest()->getQueryParam('s');

        $query = Gallery::find();

        if($s!='') {
            $query->where(['like', 'title', $s]);
            $query->orWhere(['like', 'credit', $s]);
            $query->orWhere(['like', 'caption', $s]);
        }

        $query->orderBy('id DESC');

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=>20]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('gallery', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

     /*
      Personal list  
    */

     public function actionTeamlist($q = null, $id = null, $type=null){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        if (!is_null($q)) {

            $query = PersonalTeam::find();

            if($q!='') {
                $query->where(['like', 'name', $q]);
            }
            $data = $query->select(['user_id as id', 'name as text'])->asArray()->limit(20)->all();

            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => PersonalTeam::find()->where(['user_id' => $id])->one()->name];
        }

        return $out;

    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //Yii::$app->controller->enableCsrfValidation = false;
        
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
