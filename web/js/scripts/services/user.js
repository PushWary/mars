(function() {
    'use strict';

    angular.module('marsApp').service('UserService', ['$http', UserService]);

    function UserService($http) {
        var service = {};

        service.login = function(loginForm) {
            return $http.post('user/login', loginForm);
        };

        service.register = function(user) {
            return $http.post('user/register', user);
        };

        return service;
    }
})();
