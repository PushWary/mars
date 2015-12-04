(function() {
    'use strict';

    angular.module('marsApp').config(['$locationProvider', function($locationProvider) {

        $locationProvider.html5Mode({
            enabled : true,
            requireBase : false
        });
    }]);
})();
