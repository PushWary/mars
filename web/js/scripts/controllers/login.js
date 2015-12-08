(function() {
    'use strict';

    angular.module('marsApp').controller('LoginCtrl', ['$location', '$scope', 'UserService', LoginCtrl]);

    function LoginCtrl($location, $scope, UserService) {

        $scope.submit = function(name, password, remberMe) {
            var loginForm = {'LoginForm' : {}};
            loginForm['LoginForm'].username = name;
            loginForm['LoginForm'].password = password;
            loginForm['LoginForm'].remberMe = remberMe;

            UserService.login(loginForm).then(function(result) {
                var data = result.data;
                if(data.success === 1) {
                    location.href = 'user/index';
                }else {
                    $scope.alertMsg="登录失败";
                }
            });
        };

    }
})();
