(function() {
    'use strict';

    angular.module('marsApp').service('UserService', ['$http', UserService]);

    function UserService($http) {
        var service = {};

        service.login = function(loginForm) {
            return $http.post('/user/login', loginForm);
        };

        service.register = function(user) {
            return $http.post('/user/register', user);
        };

        service.lostpwd = function(email) {
            return $http.post('/user/lostpwd', email);
        };

        service.logout = function() {
            return $http.post('/user/logout');
        };

        return service;
    }
})();
