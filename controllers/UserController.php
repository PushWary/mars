<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class UserController extends Controller {

    public $enableCsrfValidation = false;

    public function actionLogin() {
        $this->layout = false;
        if (isset($_POST['user'])) {
            var_dump($_POST['user']);
            echo "post";
        }
        return $this->render('login');
    }
}