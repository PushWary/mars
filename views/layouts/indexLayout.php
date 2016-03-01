<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Mars</title>
        <!--兼容IE-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--移动优先-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- lib css -->
        <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="/lib/components-font-awesome/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="/libs/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/main.min.css">
        <link rel="stylesheet" href="/libs/metisMenu/dist/metisMenu.min.css">
        <link rel="stylesheet/less" type="text/css" href="/css/theme.css">
        <link rel="stylesheet" href="/css/user/index.css">
        <script src="/js/modernizr/modernizr.min.js"></script>
    </head>
    <body ng-app="marsApp">
    <div class="bg-dark dk" id="wrap" >
        <?= $content ?>
    </div>

    <!-- 底部 -->
    <footer class="Footer bg-dark dker">
        <p>2015 &copy; Mars by yield</p>
    </footer>

    <script src="/libs/jquery/dist/jquery.min.js"></script>
    <script src="/libs/less/dist/less.min.js"></script>
    <script src="/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/libs/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/libs/screenfull/dist/screenfull.min.js"></script>
    <script src="/js/core.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/libs/angular/angular.min.js"></script>
    <script src="/libs/angular-ui-router/release/angular-ui-router.min.js"></script>

    <script src="/js/scripts/marsApp.js"></script>
    <script src="/js/scripts/routes.js"></script>
    <script src="/js/scripts/services/user.js"></script>
    <script src="/js/scripts/controllers/index.top.js"></script>
    </body>
</html>
