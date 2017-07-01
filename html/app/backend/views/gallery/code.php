<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\controllers\OtoAppController;
use common\models\User;

?>
<table class="table table-striped">
  <thead>
  	<tr>
  		<th>Kode</th>
  		<th>Nama</th>
  	</tr>
  </thead>
  <tbody>
  	
  		<?php foreach($model as $key=>$values):?>
  			<tr>
	  			<td><?=$values->id?></td>
	  			<td><?=$values->name?></td>
  			</tr>
  		<?php endforeach;?>
  	
  </tbody>
</table>
