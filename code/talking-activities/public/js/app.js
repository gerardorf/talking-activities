var talking = angular.module('talkingActivities',['ngRoute', 'ngCookies']);

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
//# sourceMappingURL=app.js.map
