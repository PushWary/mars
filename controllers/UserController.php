<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserValidate;

class UserController extends Controller {

    public $enableCsrfValidation = false;

    /**
     * 登录
     */
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

    /**
     * 注册
     */
    public function actionRegister() {
        $this->layout = false;
        if (isset($_POST['user'])) {
            $model = new User();
            $model->username = $_POST['user']['username'];
            $model->password = $_POST['user']['password'];
            $model->email = $_POST['user']['email'];
            if ($model->save()) {
                $userValidate = new UserValidate();
                $userValidate->email = $model->email;
                $userValidate->userid = $model->id;
                $userValidate->save();
                $this->sendVaildateMail($model->email, 'user-validate', ['token'=>$userValidate->token]);
                return "注册成功";
            } else {
                return "注册失败";
            }
        }
    }

    /**
     * 验证注册邮箱
     */
    public function actionActivemail($token) {
        $userValidate = UserValidate::find()->where(['token'=>$token])->one();
        if ($userValidate) {
            $user = User::find()->where(['id'=>$userValidate->userid])->one();
            $transtion = Yii::$app->db->beginTransaction();
            try {
                $user->status = User::STATUS_DEF['active'];
                if (!$user->save()) {
                    $transtion->rollBack();
                    return "激活失败";
                }

                $transtion->commit();
                return "激活成功";
            } catch (Exception $e) {
                $transtion->rollBack();
                return "激活失败";
            }
            
        }else {
            return "激活失败";
        }
    }

    /**
     * 发送验证邮件方法
     * @param $toEmail 发送邮件的目标邮箱
     */
    private function sendVaildateMail($toEmail, $template, $params=array()) {
        $mail = Yii::$app->mailer->compose($template, $params);
        $mail->setTo($toEmail);
        $mail->setSubject("欢迎注册mars");
        $mail->send();
    }
}
