(function() {
    'use strict';

    angular.module('marsApp').controller('RegisterCtrl', ['$location', '$scope', 'UserService', RegisterCtrl]);

    function RegisterCtrl($location, $scope, UserService) {

        $scope.submit = function(name, email, password, rePassword) {
            var user = {'user' : {}};
            user['user'].username = name;
            user['user'].email = email;
            user['password'].password = password;
            // TODO 实现表单的验证密码两次输入

            UserService.register(user).then(function(result) {
                var data = result.data;
                if(data.success === 1) {
                    location.href = 'user/index';
                }else {
                    // TODO 登录失败提示
                }
            });
        };
    }
})();
