<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use app\models\User;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * 个人操作控制器
 */
class UsersController extends BaseController {

    public $enableCsrfValidation = true; // 关闭csrf

    public function actionAvator() {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'avator');
            $flag = $model->upload();
        }
        return '{}';
    }
}

?>
