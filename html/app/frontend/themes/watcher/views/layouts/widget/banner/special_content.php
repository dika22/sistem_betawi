<?php 
use \yii;

use common\controllers\OtoFrontendAppController;
use \common\models\SpecialContent;
use \common\models\Post;
use yii\db\Expression;

$specialContent = SpecialContent::find()
			->where(['status'=>'aktif'])
			->andWhere(['between', new Expression('NOW()'), new Expression('min_date'), new Expression('max_date') ])
			->one();

if(!empty($specialContent)):

$post = Post::find()
			->joinWith(['thumbnail', 'category'])
			->where(['draft'=>'published', 'special_content_id'=>$specialContent['id']])
			->andWhere(['<', 'd_post.post_date', date('Y-m-d H:i:s')])
			->limit(3)
			->orderBy('post_date DESC')
			->all();
?>
<div class="panel panel-default" style="margin-top: 10px">
  <div class="panel-body">
  	<div class="row">
	<div class="col-md-12">
		<h1 class="section-title"><span><?=$specialContent['name']?></span></h1>
	</div>
	<?php foreach($post as $key=>$values):

		$article = OtoFrontendAppController::getArticle($values);
		$thumbnail = OtoFrontendAppController::imageThumb('gallery/' . $values['thumbnail']['image'], 221, 124);

	?>
	<div class="col-sm-4 post-standard">
		<div class="post ">
			<div class="entry-header">
				<div class="entry-thumbnail">
					<img class="img-responsive" src="<?=$thumbnail?>" alt="Foto <?=$article['title']?>" />
				</div>
			</div>
			<div class="post-content">								
				<p class="entry-title">
					<a href="<?=$article['articleUrl']?>" alt="<?=$article['title']?>">
						<?=$article['title']?>
					</a>
				</p>
			</div>
		</div><!--/post--> 	
	</div>
<?php endforeach?>
</div>
  </div>
</div>

<?php 
endif;
?>