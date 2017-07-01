<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use common\models\ReportPersonalForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\controllers\AppController;
use kartik\select2\Select2;
use yii\web\JsExpression;

$morris = Yii::getAlias('@web/fatlab/assets/morris.js-0.4.3/morris.min.js');
$raphael = Yii::getAlias('@web/fatlab/assets/morris.js-0.4.3/raphael-min.js');

$morrisCss =  Yii::getAlias('@web/fatlab/assets/morris.js-0.4.3/morris.css');

echo $this->registerJsFile($morris, ['position'=> \yii\web\View::POS_END]);
echo $this->registerJsFile($raphael, ['position'=> \yii\web\View::POS_END]);
echo $this->registerCssFile($morrisCss);
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(
        [
            'validateOnSubmit' => 1,
            'enableClientScript' => false
        ]
    ); ?>
    <div class="row">
        <div class="col-md-3">
            <?php $url = Url::to(['personal-team/teamlist']);?>
            <?php echo $form->field($searchModel, 'user')->widget(Select2::classname(), [
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
        <div class="col-md-4">
            <?= $form->field($searchModel, 'start')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter post date ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($searchModel, 'end')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter post date ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>
<div class="row">
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                Statistik Tulisan
            </header>
            <div class="panel-body">
                <div id="personal-report" class="graph"></div>
            </div>
        </section>
    </div>
    <div class="col-md-6">
        <section class="panel">
            <header class="panel-heading">
                Jumlah Tulisan
            </header>
            <div class="panel-body">
                <div id="total-personal-report" class="graph"></div>
            </div>
        </section>
    </div>
</div>
<h3>Daftar artikel yang publish</h3>
<table class="table">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>URL</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        foreach($data as $key=>$value):
        ?>
        <tr>
            <td><?=$value->title?></td>
            <td><?=date('m-d-Y', strtotime($value->post_date))?></td>
            <td>
                <?php 
               //print_r($data);
                $slug = AppController::slugify($value->title);
                $cat = AppController::slugify($value->category->name);
                $url ='http://bus-truck.id/'.$cat.'/'.$slug.'/'.$value->id;

                echo $url;
                ?>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
  </table>
<script>
    $(document).ready(function(){
        var dataPbject = JSON.parse('<?=$result?>');
        
        Morris.Line({
            element: 'personal-report',
            data: dataPbject,
            xkey: 'date',
            ykeys: ['d', 'p'],
            labels: ['Draft', 'Publish'],
            lineColors:['#8075c4','#6883a3']
          });
          
        Morris.Bar({
            element: 'total-personal-report',
            data: [
              {status: 'Publish', jumlah: <?=$publish?>},
              {status: 'Draft', jumlah: <?=$draft?>},
            ],
            xkey: 'status',
            ykeys: ['jumlah'],
            labels: ['Jumlah Tulisan'],
            barRatio: 0.4,
            xLabelAngle: 35,
            hideHover: 'auto',
            barColors: ['#6883a3']
          });  
    })
</script>