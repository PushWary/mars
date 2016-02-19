(function() {
    'use strict';

    var myApp = angular.module('marsApp', ['ui.router']);

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
