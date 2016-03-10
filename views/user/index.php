<div id="top" ng-controller="IndexTopCtrl">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <!-- logo-->
            <header class="navbar-header">
                <a href="user/index" class="navbar-brand">
                    <img src="/img/logo.png" alt="logo">
                </a>
            </header>

            <!-- 右边小工具列表 -->
            <div class="topnav">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration:none;">
                      <i class="glyphicon glyphicon-user"></i>&nbsp;个人中心
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                      <li> <a href="javascript:void(0);" ng-click="logout()">退出</a>  </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav><!-- /.navbar -->

    <!-- 搜索域 -->
    <header class="head">
        <div class="search-bar">
            <form class="main-search" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="键入关键词">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm text-muted" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div><!-- /.search-bar -->
        <div class="main-bar">
            <h3>
                <i class="fa fa-home"></i>&nbsp; Mars
            </h3>
        </div>
    </header>
</div><!-- /#top -->

<div id="left">
    <!-- 登录用户信息 -->
    <div class="media user-media bg-dark dker" ng-controller="MyInfoCtrl">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
        <div class="user-wrapper bg-dark">
            <a class="user-link" href="" ng-click="openAvator()">
                <img class="media-object img-thumbnail user-img" alt="头像" src="/img/user.gif">
                <span class="label label-danger user-label">16</span>
            </a>
        </div>
        <div class="media-body">
            <h5 class="media-heading">个人信息</h5>
            <ul class="list-unstyled user-info">
                <li><a href="" class="name"><?php echo $user->name; ?></a></li>
                <li>创建于 :
                    <br>
                    <small>
                        <i class="fa fa-calendar"></i>&nbsp;<?php echo $user->created;?>
                    </small>
                </li>
            </ul>
        </div>
    </div>

    <?php echo Yii::$app->view->renderFile('@app/views/user/_menu.php');?>
</div><!-- /#left -->
<!-- 主体内容 -->
<div id="content" style="height:800px" ui-view>
    <?php
        include("../web/view/user/index.html");
    ?>
</div><!-- /#content-->
