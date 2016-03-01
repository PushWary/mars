(function() {
    'use strict';

    angular.module('marsApp').controller('MyInfoCtrl', ['$location', '$scope', 'ngDialog', MyInfoCtrl]);

    function MyInfoCtrl($location, $scope, ngDialog) {
        $scope.openAvator = function() {
            ngDialog.open({
                template: '/view/user/changeAvator.html',
                className: 'ngdialog-theme-dropin'
            });
        };
    }
})();
