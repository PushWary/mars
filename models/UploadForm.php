<?php
namespace app\models;

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
            $this->imageFile->saveAs('uploads/'.$this->imageFile->baseName .'.jpg');
            return true;
        } else {
            return false;
        }
    }
}
?>
