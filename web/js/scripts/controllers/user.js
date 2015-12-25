(function() {
    'use strict';

    angular.module('marsApp').controller('UserCtrl', ['$location', '$scope', 'UserService', UserCtrl]);

    function UserCtrl($location, $scope, UserService) {
        var TAB = {
            LOGIN: 1,
            LOSTPWD: 2,
            REGISTER: 3
        };

        $scope.chooseTab = function($tab) {
            console.log(11);
            switch ($tab) {
                case TAB.LOGIN:
                    $scope.content = UserService.loginPage();
                    break;
                case TAB.LOSTPWD:
                    $scope.content = UserService.lostpwdPage();
                    break;
                case TAB.REGISTER:
                    $scope.content = UserService.registerPage();
                    break;
            }
        };
    }
})();
