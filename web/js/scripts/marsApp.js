(function() {
    'use strict';

    var myApp = angular.module('marsApp', ['ui.router', 'ngDialog']);

    // http 拦截器
    myApp.factory('httpInterceptor', ['$q', '$injector', function($q, $injector) {
        var httpInterceptor = {
            'responseError': function(response) {
                switch (response.status) {
                    case 404:
                        alert('404!');
                        break;
                }
                return $q.reject(response);
            },
            'response': function(response) {
                return response;
            },
            'request': function(config) {
                var csrfToken = $("meta[name='csrf-token']").attr("content");
                if (config.method === "POST") {
                    // 如果未传数据的post提交，data是undefind，如退出
                    if (config.data === undefined) {
                        config.data = {};
                    }
                    config.data['_csrf'] = csrfToken;
                }
                return config;
            },
            'requestError': function(config) {
                return $q.reject(config);
            }
        };
        return httpInterceptor;
    }]);

    // 将拦截器注册
    myApp.config(['$httpProvider', function($httpProvider) {
        $httpProvider.interceptors.push('httpInterceptor');
    }]);
})();
