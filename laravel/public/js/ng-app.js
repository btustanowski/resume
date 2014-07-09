var btApp = angular.module('btApp', [
    'ngRoute',
    'ngAnimate',
    'appControllers',
    'appServices',
    'ui.bootstrap'
]).config(['$routeProvider', '$httpProvider',
    function($routeProvider, $httpProvider) {
        $httpProvider.defaults.cache = false;
        $routeProvider.
            when('/users', {
                templateUrl: 'user',
                controller: 'UserCtrl'
            }).
            when('/words', {
                templateUrl: 'word',
                controller: 'WordCtrl'
            }).
            when('/dash', {
                templateUrl: 'dash'
            }).
            when('/practice', {
                templateUrl: 'practice',
                controller: 'PracticeCtrl'
            }).
            when('/test', {
                templateUrl: 'test',
                controller: 'TestCtrl'
            }).
            otherwise({
                redirectTo: '/dash'
            });
    }
]).run(function($rootScope, $templateCache) {
    // Make the app refresh controllers instead of caching them.
    $rootScope.$on('$routeChangeStart', function(event, next, current) {
        if (typeof(current) !== 'undefined'){
            $templateCache.remove(current.templateUrl);
        }
    });
}).directive('btnLoading',function () {
    // Bootstrap button loading handlerino.
    return {
        link:function (scope, element, attrs) {
            scope.$watch(
                function () {
                    return scope.$eval(attrs.btnLoading);
                },
                function (value) {
                    if(value) {
                        if (!attrs.hasOwnProperty('ngDisabled')) {
                            element.addClass('disabled').attr('disabled', 'disabled');
                        }

                        element.data('resetText', element.html());
                        element.html(element.data('loading-text'));
                    } else {
                        if (!attrs.hasOwnProperty('ngDisabled')) {
                            element.removeClass('disabled').removeAttr('disabled');
                        }

                        element.html(element.data('resetText'));
                    }
                }
            );
        }
    };
});