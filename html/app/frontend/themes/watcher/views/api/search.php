<?php 
use common\controllers\FrontendAppController;
use yii\helpers\Url;
use common\models\Post;
use yii\helpers\Json;

	//print_r($versus);
	//die();

		$data = [];

		foreach ($models as $key => $value) {
			$data['id'] = $value->id;
			$namecat = $value['category']['name'];
			$data['category'] = $namecat; 
			$author = $value['author0']['name'];
			$data['author0'] = $author;
			$thumb = FrontendAppController::imageThumb('drivercom.png', 265, 149); 
            $imageUrl = FrontendAppController::imageThumb('gallery/' . $value['thumbnail']['image'], 200, 160);
            
        	$data['imageUrl'] = $imageUrl;
            
            $thumbnail = FrontendAppController::imageThumb('gallery/' . $value['thumbnail']['image'], 360, 203);  
            $data['thumbnail']= $thumbnail;                   
			$data['title'] = $value->title;
			$data['teaser'] = $value->teaser;
			$data['content'] = $value->content;
			$data['post_date'] = $value->post_date;
			$edata['data'][] = $data;
		}

		if(isset($_GET['page']))
			$edata['page'] = $_GET['page'] + 1;
		else
			$edata['page'] = 1;

		//
		echo Json::encode($edata);		