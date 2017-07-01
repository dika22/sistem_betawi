<?php
/**
 * Created by PhpStorm.
 * User: adhika
 * Date: 1/23/15
 * Time: 7:13 PM
 */

namespace common\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\VarDumper;

class AppController extends Controller{

    function __construct($id, $module, $config = array()) {
        
        if(!YII_DEBUG){
            $request = new yii\web\Request();
            
            if($request->hostInfo!='http://aerospace.id'){
                $url = 'http://aerospace.id/'.$request->pathInfo;
                $this->redirect($url);
            }
        
        }
        return parent::__construct($id, $module, $config);
    }
    
    /**
     * @author haris
     * @param $value Array
     * @param bool $exit
     * @throws \yii\base\ExitException
     */
    public static function pre($value, $exit = FALSE) {
        $bt = debug_backtrace();
        $debug = '<div style="display:block;background-color:#FFF699;border-radius:10px;border:solid 1px brown;padding:10px;z-index:10000;"><pre>';
        $debug .= '<h1>Oto Debug</h1>';
        $debug .= '<h4>File: '.$bt[0]['file'].'</h4>';
        $debug .= '<h4>Method: '.$bt[1]['function'].'() line('.$bt[0]['line'].')'.'</h4>';
        $debug .=  VarDumper::dumpAsString($value, 100, true);
        $debug .= "</pre></div>\n";
        echo $debug;
        if($exit)
            Yii::$app->end();
    }

    public static function indonesianDateFormat($date){
        return date('d-M-Y', strtotime($date));
    }

    public static function indonesianDateTimeFormat($date){
        return date('d-M-Y H:i', strtotime($date));
    }

    /**
     * @author haris
     * @param $text String
     * @return mixed|string
     */
    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }
        return $text;
    }

    /**
     * 
     * @author haris
     * Indonesia Number format
     * @param  Int  $number  
     * @param  boolean $decimal 
     * @return String           
     */
    public static function indonesianNumberFormat($number, $decimal=false, $decLen=2){
        $number = intval($number);
        if(is_int($number)){
            if($number<=0){
                return "N/A";
            }else{
                if($decimal){
                    return number_format($number, $decLen, ',', '.');
                }
                else
                    return number_format($number, '0', ',', '.');
            }
            
        }else {
            return "N/A";
        }
        
    }
    
    public static function availabelFormat($var){
        $var = trim($var);
        if($var==''){
            echo 'N/A';
        }else{
            echo $var;
        }
    }

    /**
     * 
     * @author haris
     * @param $src String
     * @param $width Int
     * @param $height Int
     * @return string
     */
    public static function imageThumb($src, $width, $height){
        
        $path = Yii::getAlias('@image');
        $file = $path.'/'.$src;
        
        \Yii::info($file);
        if(!file_exists($file)){
            $src = 'blank.png';
        }
        
        if($width==0 && $height==0)
            $url = Yii::$app->params['frontUrl'].'/image/'.$src;
        else
            $url = Yii::$app->params['imageUrl'].$width.'/'.$height.'/'.$src;
        
        return $url;
    }

    /**
     * @param  String $path Lokasi file
     * @return Booelan       
     */
    public function deleteImage($path){
        
        if(file_exists($path)){
            
            if(unlink($path)){
                return true;
            }else{
                return false;
            }
            
        }else{
            return false;
        }
    }

    /**
     * Encrypt
     * @param  String $string value
     * @return String         Encrypted
     */
    public static function encrypt($string)
    {
        if(empty($string))
            throw new \yii\web\HttpException(403, 'Invalid request. Please do not repeat this request again.');

        $encryptor = new \common\components\Encryptor();
        $encryptKey = Yii::$app->params['encryptKey'];
        return $encryptor->encode($string, $encryptKey);
    }

    /**
     * decrypt
     * @param  String $encryptedString Value
     * @return String                  Decrypted
     */
    public static function decrypt($encryptedString)
    {

        if(empty($encryptedString))
            throw new \yii\web\HttpException(403, 'Invalid request. Please do not repeat this request again.');

        $encryptor = new \common\components\Encryptor();
        $encryptKey = Yii::$app->params['encryptKey'];
        return $encryptor->decode($encryptedString, $encryptKey);
    }
}
