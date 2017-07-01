<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\controllers\AppController;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if(Yii::$app->session->hasFlash('success')):?>
<div class="alert alert-success" role="alert">
     <?= Yii::$app->session->getFlash('success'); ?>
</div>
<?php endif;?>

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

    <?php
    echo $form->field($model, 'upload')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]);
    ?>

    <?php ActiveForm::end(); ?>

</div>
