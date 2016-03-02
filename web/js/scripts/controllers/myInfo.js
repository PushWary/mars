(function() {
    'use strict';

    angular.module('marsApp').controller('MyInfoCtrl', ['$location', '$scope', 'ngDialog', MyInfoCtrl]);

    function MyInfoCtrl($location, $scope, ngDialog) {
        $scope.openAvator = function() {
            ngDialog.open({
                template: '/view/user/changeAvator.html',
                className: 'ngdialog-theme-dropin',
                controller: function($rootScope) {
                    // 当dialog被打开时调用
                    $rootScope.$on('ngDialog.opened', function(e, $dialog) {
                        $("#input-id").fileinput({
                            language: "zh",
                            uploadUrl: "",
                            allowedFileExtensions: ["jpg", "png", "gif"]
                        });
                    });
                }
            });
        };
    }
})();
