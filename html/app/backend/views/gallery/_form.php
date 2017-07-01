<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\controllers\AppController;
use kartik\select2\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>
    
    <?= $form->field($model, 'credit')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'caption')->textArea(['maxlength' => 500]) ?>
    <?php
        if(!$model->isNewRecord){
             echo Html::img(
                AppController::imageThumb('gallery/'.$model->image, 150, 0)
                , ['class'=>'img-thumbnail']
            );
        }
    ?>
    <?= $form->field($model, 'upload')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Uplaod' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
