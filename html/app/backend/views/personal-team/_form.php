<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use common\controllers\AppController;
use common\models\User;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\PersonalTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-team-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($userModel, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($userModel, 'password_hash')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($userModel, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>
    <?php
        if(!$model->isNewRecord){
             echo Html::img(
                AppController::imageThumb('avatar/'.$model->avatar, 150, 0)
                , ['class'=>'img-thumbnail']
            );
        }
    ?>
    <?= $form->field($model, 'upload')->fileInput() ?>
    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'profile')->textArea() ?>

    <div class="form-group">
        <button type="submit" class="<?=$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'?>">
            <?=$model->isNewRecord ? 'Create' : 'Update'?>
        </button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
