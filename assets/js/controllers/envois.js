define(['bootstrap', 'summernote'], function(bootstrap, summernote) {
    return ['$scope', '$http', function($scope, $http) {
            $('textarea.body').summernote({
                height: 300
            });
        }];
});