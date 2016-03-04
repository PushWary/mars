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
                            showClose: false,
                            showCaption: false,
                            language: "zh",
                            uploadUrl: "/users/avator",
                            defaultPreviewContent: "<img class='media-object img-thumbnail user-img' alt='头像' src='/img/user.gif' style='width:218px'>",
                            browseLabel: '选择图片',
                            browseIcon: "<i class='glyphicon glyphicon-folder-open'></i>",
                            allowedFileExtensions: ["jpg", "png", "gif"],
                            // 设置额外上传数据
                            uploadExtraData: {
                                _csrf: $("meta[name='csrf-token']").attr("content")
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
