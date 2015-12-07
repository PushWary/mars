(function() {
    'use strict';

    angular.module('marsApp').directive('alertMsg', function() {
        return {
            restrict : 'E',
            template : '<div id="myAlert" class="alert alert-warning">{{ message }}</div>',
            scope : {
                message : '@'
            },
            transclude : true
        };
    });

})();
