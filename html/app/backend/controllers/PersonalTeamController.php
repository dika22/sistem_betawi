<?php

namespace backend\controllers;

use Yii;
use common\models\PersonalTeam;
use common\models\User;
use common\models\PersonalTeamSearch;
use common\controllers\BackendAppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Model;
use yii\helpers\Json;
/**
 * PersonalTeamController implements the CRUD actions for PersonalTeam model.
 */
class PersonalTeamController extends BackendAppController
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
     * Lists all PersonalTeam models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalTeamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTeamlist($q = null, $id = null, $type=null){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        
        if (!is_null($q)) {
            
            $query = PersonalTeam::find();

            if($q!='') {
                $query->where(['like', 'name', $q]);
            }
            $data = $query->select(['id', 'name as text'])->asArray()->limit(20)->all();

            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => PersonalTeam::find()->where(['id' => $id])->one()->name];
        }
        
        //$this->pre($out, 1);
        return $out;
    }

    /**
     * Displays a single PersonalTeam model.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id),
        ]);
    }

    /**
     * Creates a new PersonalTeam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PersonalTeam(['scenario' => 'create']);
        $userModel = new User(['scenario' => 'create']);

        if (Yii::$app->request->isPost) {

            $postData = Yii::$app->request->post();
           // $this->pre($postData);
            $model->load($postData);
            $userModel->load($postData);

            $model->upload = UploadedFile::getInstance($model, 'upload');
            
            if($model->upload)
                $model->avatar = $this->slugify($model->upload->baseName).rand(0, 5000).'.'.$model->upload->extension;
            
            $model->created_by =Yii::$app->user->id;

            $password = $userModel->password_hash;
            $userModel->setPassword($userModel->password_hash);
            $userModel->generateAuthKey();

            if ($model->upload && Model::validateMultiple([$userModel, $model])) {
                $path = Yii::getAlias('@image');

                if($userModel->save()){
                    $model->user_id = $userModel->id;
                    if($model->save()){
                        $model->upload->saveAs($path . DIRECTORY_SEPARATOR .'avatar' . DIRECTORY_SEPARATOR . $model->avatar);
                        return $this->redirect(['index', 'id' => $model->id]);
                    }else{

                    $this->pre($model->errors);
                    }
                }else{
                    $this->pre($userModel->errors);
                }

            }else{
                 $this->pre($model->errors);
                  $this->pre($userModel->errors);
                $userModel->password_hash = $password;

            }
        }

        return $this->render('create', [
                'model' => $model,
                'userModel' => $userModel
            ]);

    }

    /**
     * Updates an existing PersonalTeam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id)
    {
        $model = $this->findModel($id);
        
        $userModel = User::findOne($model->user_id);

        $userModel->scenario = 'update';

        $oldPassword = $userModel->password_hash;

        $userModel->password_hash = '';

        $oldImage = $model->avatar;

        if (Yii::$app->request->isPost) {
            
            $postData = Yii::$app->request->post();
            $model->load($postData);
            $userModel->load($postData);

            $model->upload = UploadedFile::getInstance($model, 'upload');
           // $this->pre($model->attributes, true);
            if($model->upload!=null){
                $model->avatar = $this->slugify($model->upload->baseName).rand(0, 5000).'.'.$model->upload->extension;
            }

            if($userModel->password_hash!=''){
                $userModel->setPassword($userModel->password_hash);
                $userModel->generateAuthKey();
            }else{
                $userModel->password_hash = $oldPassword;
            }
            
            if (Model::validateMultiple([$userModel, $model])) {
                $path = Yii::getAlias('@image');
                $userModel->generateAuthKey();
                if($model->save() && $userModel->save()){

                    if($model->upload!=null) {

                        $model->upload->saveAs($path . DIRECTORY_SEPARATOR . 'avatar' . DIRECTORY_SEPARATOR . $model->avatar);
                        
                        $this->deleteImage($path . DIRECTORY_SEPARATOR . 'avatar' . DIRECTORY_SEPARATOR . $oldImage);
                    }

                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }else{
                $this->pre($model->errors);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'userModel' => $userModel
        ]);
    }

    /**
     * Deletes an existing PersonalTeam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        $this->findModel($id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PersonalTeam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return PersonalTeam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
   protected function findModel($id)
    {
        if (($model = PersonalTeam::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
