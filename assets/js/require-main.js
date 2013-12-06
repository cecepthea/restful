require.config({
    paths: {
        'angular': ['//ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular', 'lib/angular.min'],
        'ngResource': ['//ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular-resource.min', 'lib/angular-resource.min'],
        'ngAnimate': 'lib/angular-animate.min',
        'uiRouter': ['//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.0/angular-ui-router.min', 'lib/angular-ui-router'],
        'uiBootstrap': 'lib/ui-bootstrap-custom-0.7.0.min',
        'bootstrap': ['//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min', 'lib/bootstrap.min'],
        'summernote': 'lib/summernote.min',
        'jQuery': ['//code.jquery.com/jquery-2.0.3.min', 'lib/jquery.min']
    },
    shim: {
        'angular': {exports: 'angular'},
        'ngResource': {
            deps: ["angular"]
        },
        'ngAnimate': {
            deps: ["angular"]
        },
        'uiRouter': {
            deps: ["angular"]
        },
        'uiBootstrap': {
            deps: ["angular"]
        },
    },
    priority: [
        "angular"
    ]
});

document.getElementsByTagName('html')[0].removeAttribute("ng-app");

require(['angular', 'lib/domReady', 'routes'], function(angular, domReady, routes) {
    domReady(function() {
        angular.bootstrap(document, ['restfulApp']);
    });
});