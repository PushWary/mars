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
            $model = new User();
            $model->username = $_POST['user']['username'];
            $model->password = $_POST['user']['password'];
            $model->email = $_POST['user']['email'];
            if ($model->save()) {
                $this->sendVaildateMail($model->email);
                return "注册成功";
            } else {
                return "注册失败";
            }
        }
    }

    /**
     * 发送验证邮件方法
     * @param $toEmail 发送邮件的目标邮箱
     */
    private function sendVaildateMail($toEmail) {
        $mail = Yii::$app->mailer->compose();
        $mail->setTo($toEmail);
        $mail->setSubject("测试邮件");
        $mail->setTextBody('欢迎测试mars.com');
        $mail->send();
    }
}
