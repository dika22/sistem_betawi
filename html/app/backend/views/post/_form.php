<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use \kartik\datetime\DateTimePicker;
use common\models\PostCategories;
use common\models\SubCategory;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\controllers\AppController;
use kartik\select2\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */

$ckeditor = Yii::getAlias('@web/fatlab/assets/ckeditor/ckeditor.js');
$ckeditorConfig = Yii::getAlias('@web/fatlab/assets/ckeditor/config.js');
$postForm = Yii::getAlias('@web/js/post_form.js');

echo $this->registerJsFile($ckeditor);
echo $this->registerJsFile($ckeditorConfig);
echo $this->registerJsFile($postForm, ['position'=>$this::POS_END]);

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(
        [
            'validateOnSubmit' => 1,
            'enableClientScript' => false
        ]
    ); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'category_id')->DropDownList(ArrayHelper::map(PostCategories::find()->all(), 'id', 'name'), ['class'=>'form-control']) ?>
        </div>
         <div class="col-md-4">
            <?= $form->field($model, 'sub_category')->DropDownList(ArrayHelper::map(SubCategory::find()->all(), 'id', 'name'), ['class'=>'form-control']) ?>
        </div>
        <div class="col-md-4">
            <?php $url = Url::to(['personal-team/teamlist']);?>
            <?php echo $form->field($model, 'author')->widget(Select2::classname(), [
                'options' => ['placeholder' => 'Pilih Penulis'],
                'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 3,
                'ajax' => [
                    'url' => $url,
                    'dataType' => 'json',
                    'data' =>  new JsExpression('function(params) { return {q:params.term}; }'),
                    
                ],
                'initSelection' => new JsExpression('function (element, callback) {
                    var id=$(element).val();
                    if (id !== "") {
                        $.ajax("'.$url.'?id=" + id, {
                            dataType: "json"
                        }).done(function(data) { callback(data.results);});
            }
        }')
                ],
                ]); 
            
            
            ?>
        </div>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 300]) ?>
    <?= $form->field($model, 'teaser')->textarea(['rows' => 6, 'maxlength'=>200]) ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'id'=>'content']) ?>
    <?= Html::button(
        'Browse',
        ['value' => Url::to(['post/gallery']),
            'id' => 'modalButton',
            'class' => 'btn btn-sm btn-primary'
        ]) ?>
    <?php
    Modal::begin([
        'id' => 'modal',
        'header' => 'Gallery',
        'size' => 'modal-lg',
        'options' => []
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>
    <?php
    Modal::begin([
        'id' => 'addNewModal',
        'header' => 'Tambah Foto',
        'size' => 'modal-lg',
        'options' => []
    ]);

    echo "<div id='modalAddContent'></div><a class='btn btn-primary' id='backToBrowse'>Kembali</a>";

    Modal::end();
    ?>
    <br/>
    <?= $form->field($model, 'image')->hiddenInput() ?>
    <div id="thumbnailContainer">
        <?php
        if(!$model->isNewRecord):
            echo Html::img(
                 AppController::imageThumb('gallery/'.$model->thumbnail->image, 150, 0)
                , ['class'=>'img-thumbnail']
            );
        endif;
        ?>
    </div>
    
    <?= $form->field($model, 'tags')->textinput(['maxlength'=>200])?>
    <?= $form->field($model, 'keyword')->textinput(['maxlength'=>200])?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'post_date')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter post date ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?php $url = Url::to(['post/gallerylist']);?>
            <?= $form->field($model, 'gallery_album_id')->widget(Select2::classname(), [
                    'options' => ['placeholder' => 'Pilih Gallery'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'minimumInputLength' => 3,
                                'ajax' => [
                                    'url' => $url,
                                    'dataType' => 'json',
                                    'data' =>  new JsExpression('function(params) { return {q:params.term}; }'),
                                ],
                                'initSelection' => new JsExpression('function (element, callback) {
                                            var id=$(element).val();
                                            if (id !== "") {
                                                $.ajax("'.$url.'?id=" + id, {
                                                    dataType: "json"
                                                }).done(function(data) { callback(data.results);});
                                            }
                                        }')
                            ],
                        ]); ?>
        </div>
        <div class="col-md-4">
            <?php $url = Url::to(['post/videolist']);?>
            <?= $form->field($model, 'video_album_id')->widget(Select2::classname(), [
                    'options' => ['placeholder' => 'Pilih Gallery'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'minimumInputLength' => 3,
                                'ajax' => [
                                    'url' => $url,
                                    'dataType' => 'json',
                                    'data' => new JsExpression('function(term,page) { return {search:term}; }'),
                                    'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                ],
                                'initSelection' => new JsExpression('function (element, callback) {
                                            var id=$(element).val();
                                            if (id !== "") {
                                                $.ajax("'.$url.'?id=" + id, {
                                                    dataType: "json"
                                                }).done(function(data) { callback(data.results);});
                                            }
                                        }')
                            ],
                        ]); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'draft')->dropDownList([ 'draft' => 'Draft', 'published' => 'Published', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'headline_home')->dropDownList([ 'ya' => 'Ya', 'tidak' => 'Tidak', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'headline_kanal')->dropDownList([ 'ya' => 'Ya', 'tidak' => 'Tidak', ], ['prompt' => '']) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>