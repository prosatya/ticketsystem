var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination']);

app.config(['$routeProvider',function($routeProvider) {
        $routeProvider.
            // when('/', {
            //     templateUrl: 'templates/login.php',
            //     controller: 'authCtrl'
            // }).
						when('/', {
                templateUrl: 'templates/home.php',
                controller: 'AdminController'
            }).
            // when('/items', {
            //     templateUrl: 'templates/items.php',
            //     controller: 'ItemController'
            // }).
            when('/tickets', {
                templateUrl: 'templates/tickets.php',
                controller: 'TicketsController'
            });
}]);