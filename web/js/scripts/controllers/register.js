(function() {
    'use strict';

    angular.module('marsApp').controller('RegisterCtrl', ['$location', '$scope', 'UserService', RegisterCtrl]);

    function RegisterCtrl($location, $scope, UserService) {
        $scope.show = false;

        $scope.submit = function(name, email, password, rePassword) {
            var user = {'user' : {}};
            user['user'].username = name;
            user['user'].email = email;
            user['password'].password = password;
            console.log(password != rePassword);
            if (password != rePassword) {
                $scope.show = true;
                $scope.alertMsg = "两次输入的密码不一致";
                return false;
            }

            // UserService.register(user).then(function(result) {
            //     var data = result.data;
            //     if(data.success === 1) {
            //         location.href = 'user/index';
            //     }else {
            //         // TODO 登录失败提示
            //     }
            // });
        };
    }
})();
