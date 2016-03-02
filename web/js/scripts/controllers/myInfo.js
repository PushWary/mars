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
                            uploadUrl: "/users/avator",
                            allowedFileExtensions: ["jpg", "png", "gif"],
                            // 设置额外上传数据
                            uploadExtraData: {
                                id: 1
                            }
                        }).on('fileuploaded', function(event, data, id, index){
                            // 上传成功后回调函数
                        });
                    });
                }
            });
        };
    }
})();
