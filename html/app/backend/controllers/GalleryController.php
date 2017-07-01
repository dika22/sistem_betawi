<?php

namespace backend\controllers;

use Yii;
use common\models\Gallery;
use common\models\GallerySearch;
use common\models\PersonalTeam;
use common\controllers\BackendAppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;


/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends BackendAppController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'logedUser' => $this->logedUser
        ]);
    }

    public function actionCode(){
        $model = PersonalTeam::find()->all();
        return $this->render('code', ['model'=>$model]);
    }

    public function actionCreatemultiple(){
        $model = new Gallery();
        $model->scenario = 'create';

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->upload = UploadedFile::getInstance($model, 'upload');

            $model->extension = $model->upload->extension;
            $model->base_name = $model->upload->baseName;
            
            $model->created_by =Yii::$app->user->id;
            $explode = explode('_br_', $model->base_name);
            $model->title = Yii::$app->request->post()['title'];
            $model->credit = Yii::$app->request->post()['credit'];
            $model->image = $this->slugify($model->title).rand(0, 5000).'.'.$model->extension;
            
            if ($model->upload && $model->validate()) {
                $path = Yii::getAlias('@image');
               
                if($model->save()){
                    $model->upload->saveAs($path . DIRECTORY_SEPARATOR .'gallery' . DIRECTORY_SEPARATOR . $model->image);
                    $out = [];
                }
            }else{
                
                $out['error'] = $model->errors;

                if(is_array($model->errors)){
                    $out['error'] = '';
                    foreach ($model->errors as $key => $value) {
                        foreach ($value as $key1 => $value1) {
                             $out['error'] .= $value1.'<br/>';;
                        }
                       
                    }
                }
            }
            return json_encode($out);
        }else{
            return $this->render('createmultiple', [
                'model' => $model,
            ]); 
        }

        
    }

    /**
     * Displays a single Gallery model.
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
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
                'model' => $model,
        ]);

    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->upload = UploadedFile::getInstance($model, 'upload');

            if($model->upload!=null){
                $model->extension = $model->upload->extension;
                $model->base_name = $model->upload->baseName;
                $model->image = $this->slugify($model->base_name).rand(0, 5000).'.'.$model->extension;
            }

            if ($model->validate()) {
                $path = Yii::getAlias('@image');
                if($model->save()){

                    if($model->upload!=null) {

                        $model->upload->saveAs($path . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . $model->image);

                        $this->deleteImage($path . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . $oldImage);
                    }

                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        $model->delete();

        $path = Yii::getAlias('@image');
        $this->deleteImage($path . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . $image);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Gallery::find()
                ->joinWith([
                    'createdBy'=> function ($q) {
                        $q->from('user cu');
                    },
                    'modifiedBy'
                ])
                ->onCondition(['gallery.id'=>$id])->one();

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionSearchjson($search = null, $id = null){
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = Gallery::find()
                    ->select(['id', 'title as text', 'image'])
                    ->where(['or', ['like','title', $search], ['like','caption', $search], ['like','credit', $search]] )
                    ->limit(20)
                    ->asArray()
                    ->all();
            $out['results'] = array_values($query);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => City::find($id)->name, ''];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No matching records found'];
        }
        echo Json::encode($out);
    }
}
