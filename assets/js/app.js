define([
    'angular',
    'filters',
    'services',
    'directives',
    'controllers',
    'uiRouter',
    ], function (angular, filters, services, directives, controllers) {
            'use strict';

            // Declare app level module which depends on filters, and services

            return angular.module('myApp', [
                    'ui.router',
                    'myApp.controllers',
                    'myApp.filters',
                    'myApp.services',
                    'myApp.directives'
            ]);
});
