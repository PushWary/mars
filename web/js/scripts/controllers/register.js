(function() {
    'use strict';

    angular.module('marsApp').controller('RegisterCtrl', ['$location', '$scope', 'UserService', RegisterCtrl]);

    function RegisterCtrl($location, $scope, UserService) {
        $scope.show = false;

        $scope.submit = function(name, email, password, rePassword) {
            var user = {
                'User': {}
            };
            user['User'].username = name;
            user['User'].email = email;
            user['User'].password = password;
            if (password != rePassword) {
                $scope.show = true;
                $scope.alertMsg = "两次输入的密码不一致";
                return false;
            }

            UserService.register(user).then(function(result) {
                var data = result.data;
                console.log(data);
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
