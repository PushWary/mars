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
        <div id="login" class="tab-pane active">
          <form action="index.html">
            <p class="text-muted text-center">
              输入你的用户名和密码
            </p>
            <input type="text" placeholder="用户名" class="form-control top">
            <input type="password" placeholder="密 码" class="form-control bottom">
            <div class="checkbox">
              <label>
                <input type="checkbox"> 记住我
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
          </form>
        </div>
        <div id="forgot" class="tab-pane">
          <form action="index.html">
            <p class="text-muted text-center">注册邮箱</p>
            <input type="email" placeholder="mail@example.com" class="form-control">
            <br>
            <button class="btn btn-lg btn-danger btn-block" type="submit">找回密码</button>
          </form>
        </div>
        <div id="signup" class="tab-pane">
          <form action="index.html">
            <input type="text" placeholder="用户名" class="form-control top">
            <input type="email" placeholder="邮箱" class="form-control middle">
            <input type="password" placeholder="密码" class="form-control middle">
            <input type="password" placeholder="重复密码" class="form-control bottom">
            <button class="btn btn-lg btn-success btn-block" type="submit">注册</button>
          </form>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">登录</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">忘记密码</a>  </li>
          <li> <a class="text-muted" href="#signup" data-toggle="tab">注册</a>  </li>
        </ul>
      </div>
    </div>

    <!--jQuery -->
    <script src="/lib/jquery/dist/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="/lib/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
