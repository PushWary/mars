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
            var content = $("#user-content");
            switch ($tab) {
                case TAB.LOGIN:
                    UserService.loginPage().then(function(result) {
                        var data = result.data;
                        content.html(data);
                    });
                    break;
                case TAB.LOSTPWD:
                    UserService.lostpwdPage().then(function(result) {
                        var data = result.data;
                        content.html(data);
                    });
                    break;
                case TAB.REGISTER:
                    UserService.registerPage().then(function(result) {
                        var data = result.data;
                        content.html(data);
                    });
                    break;
            }
        };
    }
})();
