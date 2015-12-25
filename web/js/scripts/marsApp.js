(function() {
    'use strict';

    var myApp = angular.module('marsApp', ['ui.router']);

    myApp.config(function($stateProvider, $urlRouterProvider) {
        $stateProvider.state('login', {
            url: "/user/login",
            templateUrl: "/view/user/login.html"
        }).state('lostpwd', {
            url: "/user/lostpwd",
            templateUrl: "/view/user/lostpwd.html"
        }).state("register", {
            url: "/user/register",
            templateUrl: "/view/user/register.html"
        });
    });

})();
