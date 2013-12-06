var restfulApp = angular.module('restfulApp', ['ui.router', 'ui.bootstrap', 'ngAnimate']).run(
        ['$rootScope', '$state', '$stateParams',
            function($rootScope, $state, $stateParams) {
                $rootScope.$state = $state;
                $rootScope.$stateParams = $stateParams;
            }]);

angular.module('restfulApp')
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
    }])

    .factory('utils', function() {
        return {
        // Util for finding an object by its 'id' property among an array
        findById: function findById(values, id) {
            var found=null;
            angular.forEach(values, function(value, key) {
                if(value.id == id) 
                    found=value; 
              });
            
            return found;
        }
    };
});

restfulApp.config(
        ['$stateProvider', '$urlRouterProvider',
            function($stateProvider, $urlRouterProvider) {

            // Use $urlRouterProvider to configure any redirects (when) and invalid urls (otherwise).
            $urlRouterProvider
                .when('/c?id', '/users/:id')
                .when('/user/:id', '/users/:id')
                .otherwise('/');

            $stateProvider
                .state("home", {
                    url: "/",
                    templateUrl: 'home'
                })
                        
                .state('users', {
                    url: '/users',                    
                    templateUrl: 'users/',
                    
                    resolve: {
                        users: ['users',
                            function(users) {
                                return users.all();
                            }]
                    },                    
                    controller: ['$scope', '$state', 'users', 'utils',
                        function($scope, $state, users, utils) {
                            $scope.users = users;
                        }]
                })

                .state('users.detail', {
                    url: '/{userID:[0-9]{1,4}}',
                    views: {
                        'thedetails': {
                            templateUrl: 'users/details',
                            controller: ['$scope', '$stateParams', 'utils',
                                function($scope, $stateParams, utils) {
                                    $scope.contact = utils.findById($scope.users, $stateParams.userID);
                                }]
                        }
                    }
                })
                .state('contact', {
                    url: '/contact',
                    templateProvider: ['$timeout',
                        function($timeout) { 
                            return $timeout(function() {
                                return '<p class="lead">RESTful App</p><ul>' +
                                        '<li><a href="https://github.com/angular-ui/ui-router">Routage avec ui-router</a></li>' +
                                        '<li><a href="#">CodeIgniter comme webservice RESTful</a></li>' +
                                        '<li>requireJS, sparks, Twiggy, Ion_auth</li>'
                                        '</ul>';
                            }, 1);
                        }]
                })
                .state('envoie', {
                   url: '/envoie',
                   templateUrl: 'envoie',
                   controller: ['$scope', '$state', 'users', 'utils',
                    function($scope, $state, users, utils) {
                        //angular.element(document.getElementById('message')).summernote();
                    }]
                });
            }]);