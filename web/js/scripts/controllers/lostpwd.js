(function() {
    'use strict';

    angular.module('marsApp').controller('LostpwdCtrl', ['$location', '$scope', 'UserService', LostpwdCtrl]);

    function LostpwdCtrl($location, $scope, UserService) {
        // 表单中输入值发生改变
        $scope.change = function(){
            $scope.show = false;
        };

        $scope.submit = function(email) {
            var param = {'email': email};
            UserService.lostpwd(param).then(function(result) {
                var data = result.data;
                if(data.success === 1) {
                    alert(data.message);
                    location.href = "/user/login";
                }else {
                    $scope.show = true;
                    $scope.alertMsg = data.message;
                }
            });
        };

    }
})();
