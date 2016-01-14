(function() {
    'use strict';

    angular.module('marsApp').controller('LoginCtrl', ['$location', '$scope', 'UserService', LoginCtrl]);

    function LoginCtrl($location, $scope, UserService) {
        $scope.loginForm = {
            'LoginForm': {
                'username': '',
                'password': '',
                'remberMe': false
            }
        };

        // 表单中输入值发生改变
        $scope.change = function(){
            $scope.show = false;
        };

        $scope.submit = function(loginForm) {
            UserService.login(loginForm).then(function(result) {
                var data = result.data;
                if(data.success === 1) {
                    location.href = '/user/index';
                }else {
                    $scope.show = true;
                    $scope.alertMsg = data.message;
                }
            });
        };

    }
})();
