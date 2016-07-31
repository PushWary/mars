<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>欢迎来到火星</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="/img/metis-tile.png" />
    <?php echo Html::csrfMetaTags(); ?>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/css/main.min.css">
    <base href="/">
  </head>
  <body class="login" ng-app="marsApp">
    <div class="form-signin">
      <div class="text-center">
        <img src="/img/logo.png" alt="Metis Logo">
      </div>
      <hr>
      <div class="tab-content" ui-view>
        <?= $content ?>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="javascript:void(0);" ui-sref="login">登录</a>  </li>
          <li> <a class="text-muted" href="javascript:void(0);" ui-sref="lostpwd">忘记密码</a>  </li>
          <li> <a class="text-muted" href="javascript:void(0);" ui-sref="register">注册</a>  </li>
        </ul>
      </div>
    </div>

    <!--jQuery -->
    <script src="/libs/jquery/dist/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--User Register -->
    <script src="/js/user/register.js"></script>

    <!--scripts-->
    <?php echo Yii::$app->view->renderFile('@app/views/layouts/_scripts.php'); ?>
  </body>
</html>
