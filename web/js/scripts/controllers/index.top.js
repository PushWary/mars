(function() {
    'use strict';

    angular.module('marsApp').controller('IndexTopCtrl', ['$location', '$scope', 'UserService', IndexTopCtrl]);

    function IndexTopCtrl($location, $scope, UserService) {

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

        $scope.logout = function() {
            UserService.logout().then(function(result) {
                var data = result.data;
                if (data.success === 1) {
                    location.href = '/user/login';
                } else {
                    alert('似乎发生了一点问题！');
                }
            });
        };

    }
})();
