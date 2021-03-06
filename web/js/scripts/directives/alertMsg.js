(function() {
    'use strict';

    angular.module('marsApp').directive('alertmsg', function() {
        return {
            restrict : 'E',
            template : '<div id="myAlert" class="alert alert-warning">{{ message }}</div>',
            scope : {
                message : '@'
            }
        };
    });

})();
