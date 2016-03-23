(function() {
    'use strict';

    angular.module('marsApp').config(function($stateProvider, $urlRouterProvider) {
        $stateProvider.state('login', {
            url: "/user/login",
            templateUrl: "/view/user/login.html"
        }).state('lostpwd', {
            url: "/user/lostpwd",
            templateUrl: "/view/user/lostpwd.html"
        }).state("register", {
            url: "/user/register",
            templateUrl: "/view/user/register.html"
        }).state("index", {
            url: "/user/index",
            templateUrl: "/view/user/index.html"
        }).state("order", {
            url: "/order",
            templateUrl: "/view/order/index.html",
            redirectTo: "order.index"
        }).state("order.index", {
            url: "/index",
            templateUrl: "/view/order/index.html"
        });
    });
})();
