<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\LoginForm;
use app\models\UserValidate;
use app\models\OperationLog;
use app\models\LocalAuth;

class UserController extends BaseController {

    public $enableCsrfValidation = false;

    // authKey的前缀
    const AUTH_PREFIX = "ams";

    // 使用userlayout的action
    const USER_LAYOUT_ACTION = ['login', 'register', 'lostpwd'];

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (in_array($action->id, self::USER_LAYOUT_ACTION)) {
            $layout = Yii::$app->request->get('layout', 0);
            if ($layout == 1) {
                $this->layout = false;
            } else {
                $this->layout = 'userLayout';
            }
        }

        return true;
    }

    /**
     * 登录
     */
    public function actionLogin() {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $postData = $this->getPostJSON();
        if ($postData) {
            if ($model->load($postData) && $model->login($this->getIP())) {
                $result = ['success'=>1, 'message'=> '登录成功'];
                return json_encode($result);
            }else {
                return json_encode(['success'=>0, 'message'=> '登录失败']);
            }
        }else {
            return $this->render('_login');
        }
    }

    /**
     * 注册
     */
    public function actionRegister() {

        $postData = $this->getPostJSON();
        if ($postData) {
            $model = new User();
            $model->load($postData);
            $model->authKey = $this->getUUID(self::AUTH_PREFIX);
            $transtion = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {

                    // 增加本地用户名登录方式
                    LocalAuth::saveByName($model->id, $model->name, $postData['User']['password']);

                    // 增加本地邮箱登录方式
                    LocalAuth::saveByEmail($model->id, $model->email, $postData['User']['password']);

                    $userValidate = new UserValidate();
                    $userValidate->email = $model->email;
                    $userValidate->userid = $model->id;
                    if (!$userValidate->save()) {
                        $transtion->rollBack();
                        $error = current($model->getErrors());
                        $message = current($error);
                        return json_encode(['success'=>0, 'message'=>$message]);
                    }
                    //$this->sendVaildateMail($model->email, 'user-validate', ['token'=>$userValidate->token]);

                    $resultLog = OperationLog::saveLog($model->name."注册", $model->id, OperationLog::TYPE_USER);
                    if (!$resultLog['result']) {
                        $transtion->rollBack();
                        return json_encode(['success'=>0, 'message'=>$resultLog['message']]);
                    }

                    $transtion->commit();
                    return json_encode(['success'=>1, 'message'=>'注册成功']);
                } else {
                    $transtion->rollBack();
                    $error = current($model->getErrors());
                    $message = current($error);
                    return json_encode(['success'=>0, 'message'=>$message]);
                }
            } catch (Exception $e) {
                $transtion->rollBack();
                return json_encode(['success'=>0, 'message'=>$e->getMessage()]);
            }
        }else {
            return $this->render('_register');
        }
    }

    /**
     * 忘记密码
     */
    public function actionLostpwd() {
        return $this->render('_lostpwd');
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

                $resultLog = OperationLog::saveLog($user->name."激活", $user->id, OperationLog::TYPE_USER);
                if (!$resultLog['result']) {
                    $transtion->rollBack();
                    return $resultLog['message'];
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
     *  访问主页
     */
    public function actionIndex() {
        $this->layout = "indexLayout";
        return $this->render("index");
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
