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
    ])
.run(['$rootScope', '$location', '$window', '$log', function($rootScope, $location, $window, $log){
    $rootScope.$log = $log;
    if ($location.path != "/login" && typeof $window.sessionStorage.token == "undefined") { //user doesn't seem to be loggedin, redirect them.
         $location.path("/login");
     }
}]);
    
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


/* Controllers */
todoControllers.controller('navbar', ['$scope', '$window', '$location',
    function($scope, $window, $location){
        $scope.logout = function () {
            Object.getOwnPropertyNames($window.sessionStorage).forEach(function(key, idx){
                delete $window.sessionStorage[key];
            }); //unset all our sessionStorage objects
            $location.path("/");
        };
}]);

todoControllers.controller('loginCtrl', ['$scope', '$http', '$window', '$location', '$cookies',
    function($scope, $http, $window, $location, $cookies) {
        /* process the login */
        $scope.submit = function () {
            $scope.doingSub = true;

            $http
                .post('/api/auth', $scope.user)
                .success(function (data, status, headers, config) {
                    $window.sessionStorage.token = data.token;
                    if ($scope.user.remember) { $cookies.saved_email = $scope.user.email; } else {
                        delete $cookies.saved_email;
                    }
                    $location.path('/lists');
                })
                .error(function (data, status, headers, config) {
                    delete $window.sessionStorage.token;
                    $scope.message = {
                        show: true,
                        text: "Error: Invalid email or password. Please try again or call for a password reset.",
                        class: 'alert-danger'
                    };
                });
        };
    }
]);
