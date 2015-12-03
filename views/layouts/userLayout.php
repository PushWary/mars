<?php

use yii\helpers\Url;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/css/main.min.css">
  </head>
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        <img src="/img/logo.png" alt="Metis Logo">
      </div>
      <hr>
      <div class="tab-content">
        <?= $content ?>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="<?php echo Url::to(['user/login'])?>">登录</a>  </li>
          <li> <a class="text-muted" href="<?php echo Url::to(['user/lostpwd'])?>" >忘记密码</a>  </li>
          <li> <a class="text-muted" href="<?php echo Url::to(['user/register'])?>" >注册</a>  </li>
        </ul>
      </div>
    </div>

    <!--jQuery -->
    <script src="/lib/jquery/dist/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="/lib/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--User Register -->
    <script src="/js/user/register.js"></script>
  </body>
</html>
