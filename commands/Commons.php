<?php
/**
 * 这个类提供一些公用的静态方法
 */

namespace app\commands;

class Commons {

    /**
     * 创建一个UUID
     * @return string UUID
     */
    public static function createUUID() {
        $str = md5(uniqid(mt_rand(), true));
        $uuid  = substr($str,0,8) . '-';
        $uuid .= substr($str,8,4) . '-';
        $uuid .= substr($str,12,4) . '-';
        $uuid .= substr($str,16,4) . '-';
        $uuid .= substr($str,20,12);
        return $uuid;
    }
}

 ?>
