<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;

/**
 * 订单控制器
 */
class OrderController extends BaseController {

    public function actionIndex() {
        $this->layout = "indexLayout";
        $user = User::find()->where(['id'=>Yii::$app->user->getId()])->one();
        return $this->render("/user/index", ['user'=>$user]);
    }
}
