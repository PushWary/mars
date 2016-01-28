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

        service.loginPage = function() {
            return $http.get('/user/login?layout=1');
        };

        service.registerPage = function() {
            return $http.get('/user/register?layout=1');
        };

        service.lostpwdPage = function() {
            return $http.get('/user/lostpwd?layout=1');
        };

        service.logout = function() {
            return $http.post('/user/logout');
        };

        return service;
    }
})();
