
<div id="signup" class="tab-pane active">
  <form action="/user/register" method="POST" onSubmit="return subRegister()">
    <input type="text" placeholder="用户名" class="form-control top" id="register_username" name="user[username]" required maxlength="32"
        pattern="[0-9a-zA-Z!@#^&*()_+{}|:?\-=\[\].]{5,32}" title="字母,数字,下划线,长度5~32">
    <input type="email" placeholder="邮箱" class="form-control middle" id="register_email" name="user[email]" required maxlength="32">
    <input type="password" placeholder="密码" class="form-control middle" id="register_password" name="user[password]" required maxlength="32"
        pattern="[0-9a-zA-Z!@#^&*()_+{}|:?\-=\[\].]{5,32}" title="字母,数字,下划线,长度5~32">
    <input type="password" placeholder="重复密码" class="form-control bottom" id="register_rePassword" name="rePassword" required maxlength="32"
        pattern="[0-9a-zA-Z!@#^&*()_+{}|:?\-=\[\].]{5,32}" title="字母,数字,下划线,长度5~32">
    <button class="btn btn-lg btn-success btn-block" type="submit">注册</button>
  </form>
</div>
