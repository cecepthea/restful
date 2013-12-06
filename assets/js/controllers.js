define(['angular', 'services'], function(angular) {
    'use strict';

    /* Controllers */

    return angular.module('restfulApp.controllers', ['restfulApp.services'])
            .controller('debug', ['$scope', '$injector', 'version', function($scope, $injector, version) {
            require(['controllers/debug'], function(debug) {
                $scope.scopedAppVersion = 'appVersion: ' + version;
                $injector.invoke(debug, this, {'$scope': $scope});
            });
        }]).controller('envois', ['$scope', '$injector', function($scope, $injector) {
            require(['controllers/envois'], function(debug) {
                $injector.invoke(envois, this, {'$scope': $scope});
            });
        }]);
});