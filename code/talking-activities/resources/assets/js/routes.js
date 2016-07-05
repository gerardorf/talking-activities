talking.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
    $routeProvider
        .when('/login', {
            templateUrl: 'views/login.html',
            controller: 'loginController'
        })
        .when('/welcome', {
            templateUrl: 'views/welcome.html',
            controller: 'welcomeController'
        })
        .otherwise({
            redirectTo: '/login'
        });
}]);