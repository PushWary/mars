<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>你已经登录火星</title>
        <!--兼容IE-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--移动优先-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo Html::csrfMetaTags(); ?>

        <!-- lib css -->
        <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="/lib/components-font-awesome/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="/libs/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/libs/metisMenu/dist/metisMenu.min.css">
        <link rel="stylesheet" href="/libs/ng-dialog/css/ngDialog.min.css">
        <link rel="stylesheet" href="/css/ngDialog-theme-dropin.css">
        <link rel="stylesheet" href="/libs/bootstrap-fileinput/css/fileinput.min.css">
        <link rel="stylesheet/less" type="text/css" href="/css/theme.css">
        <link rel="stylesheet" href="/css/user/index.css">
        <link rel="stylesheet" href="/css/common.css">
        <script src="/js/modernizr/modernizr.min.js"></script>
        <base href="/">
    </head>
    <body ng-app="marsApp">
    <div class="bg-dark dk" id="wrap" style="height:100%">
        <?= $content ?>
    </div>

    <!-- 底部 -->
    <footer class="Footer bg-dark dker">
        <p>2015 &copy; Mars by yield</p>
    </footer>

    <!-- scripts -->
    <?php echo Yii::$app->view->renderFile('@app/views/layouts/_scripts.php'); ?>
    </body>
</html>
