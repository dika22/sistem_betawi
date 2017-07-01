<?php

namespace backend\controllers;

use Yii;
use common\models\GalleryAlbumCollection;
use common\models\GalleryAlbumCollectionSearch;
use common\models\GalleryAlbum;
use common\models\Gallery;
use yii\data\Pagination;
use common\controllers\BackendAppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleryAlbumCollectionController implements the CRUD actions for GalleryAlbumCollection model.
 */
class GalleryAlbumCollectionController extends BackendAppController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionRotateView(){

        $albumId = Yii::$app->getRequest()->getQueryParam('gallery_album');
        $album = $this->findAlbum($albumId);

        $albumCollection = GalleryAlbumCollection::find()
                            ->where(['gallery_album_id'=>$album->id])
                            ->joinWith(['gallery'])
                            ->asArray()
                            ->all();

        return $this->render('rotate-view', [
            'album' => $album,
            'collection' => $albumCollection
        ]);
    }

    /**
     * Lists all GalleryAlbumCollection models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GalleryAlbumCollectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new GalleryAlbumCollection();
        $albumId = Yii::$app->getRequest()->getQueryParam('gallery_album');
        $album = $this->findAlbum($albumId);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'album' => $album,
            'model' => $model
        ]);
    }

    /**
     * @return String View
     */
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
            ->orderBy('id DESC')
            ->all();

        return $this->render('gallery', [
            'models' => $models,
            'pages' => $pages,
            'album_id' => Yii::$app->getRequest()->getQueryParam('gallery_album')
        ]);
    }

    /**
     * Displays a single GalleryAlbumCollection model.
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
     * Creates a new GalleryAlbumCollection model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryAlbumCollection();

        $gallery_id = Yii::$app->getRequest()->getQueryParam('gallery_id');

        $album_id = Yii::$app->getRequest()->getQueryParam('album_id');

        if($gallery_id!=''){
            $model->gallery_id = $gallery_id;
            $model->created_by = Yii::$app->user->id;
            $model->gallery_album_id = $album_id;
            if($model->save()){
                return $this->redirect(['index', 'gallery_album' => $album_id]);    
            }
        }
    }


    /**
     * Deletes an existing GalleryAlbumCollection model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $album_id = $model->gallery_album_id;
        $model->delete();

        return $this->redirect(['index', 'gallery_album' => $album_id]);  
        
    }

    /**
     * Finds the GalleryAlbumCollection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryAlbumCollection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GalleryAlbumCollection::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the GalleryAlbum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryAlbum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findAlbum($id)
    {
        if (($model = GalleryAlbum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
