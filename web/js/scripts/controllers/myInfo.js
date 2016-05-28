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
                            showClose: false,     // 是否显示每个图片右上角的图片
                            showCaption: true,   //  是否显示file空间的路径框
                            language: "zh",     // 语言
                            uploadUrl: "/users/avator",   // 上传文件路径
                            defaultPreviewContent:
                                "<img class='media-object img-thumbnail user-img' alt='头像' src='/img/user.gif' style='width:218px'>",  // 默认预览
                            browseLabel: '选择图片',  // file控件的文本
                            browseIcon: "<i class='glyphicon glyphicon-folder-open'></i>",  // file控件的图标
                            allowedFileExtensions: ["jpg", "png", "gif"],   // 限制上传文件类型
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
