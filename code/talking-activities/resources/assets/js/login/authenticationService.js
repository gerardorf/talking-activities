talking.service('authenticationService', ['$http', function($http) {

    var authenticate = function (login) {
        return $http({
            method: 'post',
            url: '/system/authentication',
            data: login
        });
    };
    
    return{
        authenticate: authenticate
    }
}]);