<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;

class UserController extends Controller {

    public $enableCsrfValidation = false;

    public function actionLogin() {
        $this->layout = false;
        if (isset($_POST['user'])) {
            $checkLogin = User::validateLogin($_POST['user']['username'], $_POST['user']['password']);
            if ($checkLogin) {
                return "登录成功";
            }else {
                return "登录失败";
            }
        }
        return $this->render('login');
    }

    public function actionRegister() {
        $this->layout = false;
        if (isset($_POST['user'])) {
            var_dump($_POST['user']);
            $model = new User();
            $model->username = $_POST['user']['username'];
            $model->password = $_POST['user']['password'];
            $model->email = $_POST['user']['email'];
            if ($model->save()) {
                return "注册成功";
            } else {
                return "注册失败";
            }
            
        }
    }
}