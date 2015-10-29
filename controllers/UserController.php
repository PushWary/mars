<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class UserController extends Controller {

    public function actionLogin() {
        $this->layout = false;
        return $this->render('login');
    }
}