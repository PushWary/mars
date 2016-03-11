<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
            $name = $this->imageFile->name;
            $fileType = substr($name, strripos($name,'.')+1);
            $path = 'uploads/'.$this->imageFile->baseName . '.'. $fileType;  // 保存文件路劲
            $transtion =  Yii::$app->db->beginTransaction();

            // 获取当前用户
            $user = User::find()->where(['id'=>Yii::$app->user->getId()])->one();
            try {
                $user->avator = $path;  // 保存文件路径到数据表中
                if (!$user->save()) {
                    return false;
                }
                $this->imageFile->saveAs($path);
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
