<?php
/**
 * Created by PhpStorm.
 * User: adhika
 * Date: 1/23/15
 * Time: 7:13 PM
 */

namespace common\controllers;

use common\models\User;
use Yii;

class BackendAppController extends AppController{
    
    public $logedUser;
    public $username;
    
    function __construct( $id, $module, $config = [] ){

        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }else{
            $this->logedUser = User::findOne(['id'=>Yii::$app->getUser()->id]);
            $this->username = \Yii::$app->user->identity['username'];
        }
        
        return parent::__construct($id, $module, $config);
    }


}
