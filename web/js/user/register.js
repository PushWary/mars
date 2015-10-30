
function subRegister() {
    var password = $("#register_password").val();
    var repassword = $("#register_rePassword").val();

    if (password == repassword) {
        return true;
    } else {
        alert("两次输入密码不一致");
        return false;
    } 
}