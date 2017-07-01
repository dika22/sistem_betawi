<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use common\controllers\OtoAppController;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Multiple Upload';
$this->params['breadcrumbs'][] = ['label' => 'Gambar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
	
	
</script>
<?php 
	$this->registerJs(new JsExpression("

		var titleD = {};
		$(document).ready(function() {
			$('#gallery-title' ).keypress(function() {
			  	titleD = $('#gallery-title').val();
			  	console.log(window.titleD);
			});
		});

		function getFormData(){
				alert($('#gallery-title').val());
			    var title = $('#gallery-title').val();
			    var credit = $('#gallery-credit').val();
			    var photographer = $('#gallery-photographer').val();
			   
			    var data = {
			        title:title,
			        credit:credit,
			        photographer:photographer
			    };
			    return data;
			}"
	
	), View::POS_END, 'my-options');
?>
<div class="gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="gallery-form">
    	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    	
    	<?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>
    	<?= $form->field($model, 'credit')->textInput(['maxlength' => 100]) ?>
    	<?php $url = Url::to(['personal-team/teamlist']);?>
    	<?= $form->field($model, 'photographer')->widget(Select2::classname(), [
                'options' => ['placeholder' => 'Pilih'],
                'pluginOptions' => 
                    [
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

    	<?= $form->field($model, 'caption')->textArea(['maxlength' => 500]) ?>  
	    <?php 
	    echo FileInput::widget([
		    'name' => 'Gallery[upload]',
		    'options'=>[
		        'multiple'=>true,
		        'accept' => 'image/*',
		    ],
		    'pluginEvents' => [
				'filepreupload' => 'function(event, data, previewId, index, jqXHR) {
				    data.form.append("title", $("#gallery-title").val());
				    data.form.append("credit", $("#gallery-credit").val());
				    data.form.append("photographer", $("#gallery-photographer").val());
				    data.form.append("caption", $("#gallery-caption").val());
				}',
			],
		    'pluginOptions' => [
		    	'allowedFileExtensions'=>['jpg','png'],
		    	'previewFileType' => 'image',
		        'uploadUrl' => Url::to(['gallery/createmultiple']),
		        'maxFileCount' => 10,
		        
		    ]
		]);

    	?>


	    <?php ActiveForm::end(); ?>

	    
	    	
	</div>


</div>

