    (function() {
    'use strict';

    angular.module('marsApp').config(['$stateProvider', '$urlRouterProvider',
        '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {

            $urlRouterProvider.otherwise('/');
            $locationProvider.html5Mode(true);

            $stateProvider.state('login', {
                url: "^/user/login",
                templateUrl: "/view/user/login.html"
            }).state('lostpwd', {
                templateUrl: "/view/user/lostpwd.html"
            }).state("register", {
                templateUrl: "/view/user/register.html"
            }).state("index", {
                templateUrl: "/view/user/index.html"
            }).state("order", {
                templateUrl: "/view/order/index.html"
            });
    }]);
})();
