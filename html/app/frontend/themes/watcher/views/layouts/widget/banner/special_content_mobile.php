<?php 
use \yii;

use common\controllers\OtoFrontendAppController;
use \common\models\SpecialContent;
use \common\models\Post;
use yii\db\Expression;

$specialContent = SpecialContent::find()
			->where(['status'=>'aktif'])
			->andWhere(['between', new Expression('NOW()'), 'min_date','max_date' ])
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
<!-- spesial content -->
<div class="row">
	<div class="col-md-12">
		<div class="section-title"><span><?=$specialContent['name']?></span></div>
	</div>
	<div class="post" style="margin-top: 0px">
		<div class="list-post">
			<ul>
				<?php 
				foreach($post as $key=>$values){

					$article = OtoFrontendAppController::getArticle($values);
					$thumbnail = OtoFrontendAppController::imageThumb('gallery/' . $values['thumbnail']['image'], 100, 100);

					?>
					<li>
						<a href="<?=$article['articleUrl']?>" alt="<?=$article['title']?>">
							<?=$article['title']?>
						</a>
					</li>
					<?php 
				};
				?>
			</ul>
		</div>	
	</div>
</div> 
<!--special content-->

<?php 
endif;
?>