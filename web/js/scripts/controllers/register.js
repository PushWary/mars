(function() {
    'use strict';

    angular.module('marsApp').controller('RegisterCtrl', ['$location', '$scope', 'UserService', RegisterCtrl]);

    function RegisterCtrl($location, $scope, UserService) {
        $scope.show = false;

        $scope.user = {
            'User': {
                'name': '',
                'email': '',
                'password': ''
            }
        };

        $scope.submit = function(user, rePassword) {

            if ($scope.user.User.password != rePassword) {
                $scope.show = true;
                $scope.alertMsg = "两次输入的密码不一致";
                return false;
            }

            UserService.register(user).then(function(result) {
                var data = result.data;
                if (data.success === 1) {
                    location.href = '/user/index';
                } else {
                    $scope.show = true;
                    $scope.alertMsg = data.message;
                }
            });
        };
    }
})();
