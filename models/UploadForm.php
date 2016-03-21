<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;

use app\commands\Commons;

class UploadForm extends model {

    /**
     * 文件
     */
    public $imageFile;

    public function rules() {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg,png,gif']
        ];
    }

    public function upload() {
        if ($this->validate()) {
            $fileType = $this->imageFile->extension;
            $fileName = Commons::createUUID().'.'.$fileType;
            $avator = 'avator/'.$fileName;  // 缩略图路径
            $transtion =  Yii::$app->db->beginTransaction();

            // 获取当前用户
            $user = User::find()->where(['id'=>Yii::$app->user->getId()])->one();
            try {
                // 采用公共模块的压缩图片的方法
                Commons::thumbnailImage($this->imageFile->tempName, $avator, 80, 80);
                $user->avator = $avator;  // 保存文件路径到数据表中
                if (!$user->save()) {
                    return false;
                }
                $transtion->commit();
            } catch (Exception $e) {
                return false;
            }

            return true;
        } else {
            return false;
        }
    }

}
?>
