'use strict';

/* App Module */

var todoApp - angular.module('todoApp' [
    'ngRoute',
    'ngSanitize',
    'ngCookies',
    'todoControllers'
]);

todoApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.when('/login', {
            templateUrl: '/views/login.html',
            controller: 'loginCtrl'
        })
        .otherwise({
            redirectTo: '/login'
        });
    }
    ]);      
    
todoApp.factory('authInterceptor', function ($rootScope, $q, $window, $location) {
    return {
        request: function (config) {
            config.headers = config.headers || {};
            if ($window.sessionStorage.token) {
                config.headers.Authorization = 'Bearer ' + $window.sessionStorage.token;
            }
            return config;
        },
        responseError: function (rejection) {
            if (rejection.status === 401) {
                // handle the case where the user is not authenticated
                $location.path("/login");
            }
            return $q.reject(rejection);
        }
    };
});

todoApp.config(function ($httpProvider) {
    $httpProvider.interceptors.push('authInterceptor');
});
