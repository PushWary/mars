<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class BaseController extends Controller {

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
}
