<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use app\models\User;

/**
 * 个人操作控制器
 */
class UsersController extends BaseController {

    public $enableCsrfValidation = true; // 关闭csrf

    public function actionAvator() {
        return "{}";
    }
}

?>
