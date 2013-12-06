define(['angular', 'ngAnimate', 'uiRouter', 'uiBootstrap', 'controllers', 'services'], function(angular) {
    var restfulApp = angular.module('restfulApp', ['ui.router', 'ui.bootstrap', 'ngAnimate', 'restfulApp.controllers', 'restfulApp.services']).run(
            ['$rootScope', '$state', '$stateParams',
                function($rootScope, $state, $stateParams) {
                    $rootScope.$state = $state;
                    $rootScope.$stateParams = $stateParams;
                }])
            .factory('users', ['$http', function($http, utils) {
            var path = 'api/users';
            var users = $http.get(path).then(function(resp) {
                return resp.data;
            });
            var factory = {};
            factory.all = function() {
                return users;
            };
            factory.get = function(id) {
                return users.then(function() {
                    return utils.findById(users, id);
                })
            };
            return factory;
        }
    ])
            .factory('utils', function() {
        return {
            // Util for finding an object by its 'id' property among an array
            findById: function findById(values, id) {
                var found = null;
                angular.forEach(values, function(value, key) {
                    if (value.id == id)
                        found = value;
                });
                return found;
            }
        };
    });
    return restfulApp;
});