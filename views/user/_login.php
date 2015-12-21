
<div id="login" class="tab-pane active" ng-controller='LoginCtrl'>
  <form method="POST" ng-submit="submit(name, password, remberMe)">
    <p class="text-muted text-center" >
        输入用户名和密码
    </p>
    <input type="text" placeholder="用户名" class="form-control top"  required maxlength="32"
        pattern="[0-9a-zA-Z!@#^&*()_+{}|:?\-=\[\].]{5,32}" title="字母,数字,下划线,长度5~32" ng-model="name" ng-change="change()">
    <input type="password" placeholder="密 码" class="form-control bottom" required maxlength="32"
        pattern="[0-9a-zA-Z!@#^&*()_+{}|:?\-=\[\].]{5,32}" title="字母,数字,下划线,长度5~32" ng-model="password" ng-change="change()">
    <div class="checkbox">
      <label>
        <input type="checkbox" ng-model="remberMe"> 记住我
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
  </form>
  <alertmsg message="{{ alertMsg }}" ng-show="show"></alertmsg>
</div>
