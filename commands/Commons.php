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

    /**
     * 保存缩略图生成函数
     * @param string $sourcePath 源路径
     * @param string $outPath 输出路径
     * @param int $width 宽度
     * @param int $height 高度
     */
    public static function thumbnailImage($sourcePath, $outPath, $width, $height) {
        $imageine = new \Imagine\Gd\Imagine();
        $size = new \Imagine\Image\Box($width, $height);
        $mode = \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;

        $imageine->open($sourcePath)->thumbnail($size, $mode)->save($outPath);
    }
}

 ?>
