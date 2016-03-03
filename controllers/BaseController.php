<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class BaseController extends Controller {

    public $enableCsrfValidation = false;

    // 游客可访问action列表
    const GUEST_ACTIONS = ['login', 'register', 'lostpwd'];

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (Yii::$app->user->isGuest && !in_array($action->id, self::GUEST_ACTIONS)) {
            $this->redirect('/user/login');
        }

        // 使用json提交的数据进行csrf验证
        $postData = $this->getPostJSON();
        if($postData && Yii::$app->getErrorHandler()->exception === null && !Yii::$app->getRequest()->validateCsrfToken($postData['_csrf'])) {
            throw new BadRequestHttpException(Yii::t('yii', 'Unable to verify your data submission.'));
        }

        return true;
    }

    /**
     *  获取uuid
     * @param $prefix 指定前缀
     */
    public function getUUID($prefix = "") {
        $str = md5(uniqid(mt_rand(), true));
        $uuid  = substr($str,0,8) . '-';
        $uuid .= substr($str,8,4) . '-';
        $uuid .= substr($str,12,4) . '-';
        $uuid .= substr($str,16,4) . '-';
        $uuid .= substr($str,20,12);
        return $prefix.$uuid;
    }

    /**
     *  获取post的JSON数据并解析成数组
     * @return 数组或false
     */
    public function getPostJSON() {
        if (isset($GLOBALS['HTTP_RAW_POST_DATA'])) {
            return json_decode($GLOBALS['HTTP_RAW_POST_DATA'], true);
        }else {
            return false;
        }
    }

    /**
     * 获取当前用户的ip
     */
    public function getIP() {
        if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else if (!empty($_SERVER["REMOTE_ADDR"])) {
            $cip = $_SERVER["REMOTE_ADDR"];
        }else {
            $cip = '';
        }

        preg_match("/[\d\.]{7,15}/", $cip, $cips);
        $cip = isset($cips[0]) ? $cips[0] : 'unknown';
        unset($cips);
        return $cip;
    }

    /**
     * 根据IP获取用户所在地址
     */
    public function lazdf($ip) {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,"http://www.ip138.com/ips138.asp?ip=".$ip);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_close($curl);
        preg_match("/<ul class=\"ul1\"><li>(.*?)<\/li>/i",$ipdz,$jgarray);
        preg_match("/本站主数据：(.*)/i", $jgarray[1],$ipp);
        return  "<div class=\"global_widht global_zj zj\" style=\"background: none repeat scroll 0% 0% rgb(226, 255, 191); font-size: 12px; color: rgb(85, 85, 85); height: 30px; line-height: 30px; border-bottom: 1px solid rgb(204, 204, 204); text-align: left;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;欢迎来自&nbsp;<b>".$ipp[1]."</b>&nbsp;的朋友！</div>";
    }
}
