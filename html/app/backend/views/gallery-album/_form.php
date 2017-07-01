<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryAlbum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'type')->dropDownList([ '360_view' => '360 view', 'post' => 'Post', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'desc')->textArea(['maxlength' => 500]) ?>
	
    <?php
     if(!$model->isNewRecord)
        echo $form->field($model, 'status')->dropDownList([ 'draft' => 'draft', 'publish' => 'publish', ], ['prompt' => '']);
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
