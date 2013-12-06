define(['restfulApp'], function(restfulApp) {
    return restfulApp.config(
            ['$stateProvider', '$urlRouterProvider',
                function($stateProvider, $urlRouterProvider) {

                    $urlRouterProvider
                            .when('/c?id', '/users/:id')
                            .when('/user/:id', '/users/:id')
                            .otherwise('/');

                    $stateProvider
                            .state("home", {
                        url: "/",
                        templateUrl: 'home'
                    })

                            .state('contacts', {
                        url: '/contacts',
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

                            .state('contacts.detail', {
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
                            .state('debug', {
                        url: '/debug',
                        controller: 'debug',
                        templateProvider: ['$timeout',
                            function($timeout) {
                                return $timeout(function() {
                                    return '<p class="lead">RESTful App</p><ul>' +
                                            '<li><a href="https://github.com/angular-ui/ui-router" target="_blank">routage Javascript avec ui-router</a></li>' +
                                            '<li><a href="http://codeigniter.com" target="_blank">API CodeIgniter comme webservice RESTful</a></li>' +
                                            '<li>Sparks, Twiggy, Ion_auth, carabiner_less</li>' +
                                            '<li>{{jsversions}}</li>' +
                                            '<li>{{scopedAppVersion}}</li>' +
                                            '</ul>';
                                }, 1);
                            }]
                    })
                            .state('envois', {
                        url: '/envois',
                        templateUrl: 'envoie',
                        controller: ['$scope', '$state', 'utils',
                            function($scope, $state, users, utils) {
                            }]
                    });
                }]);
});