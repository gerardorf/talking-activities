talking.service('authenticationService', ['$http', function($http) {

    var authenticate = function (credentials) {
        return $http({
            method: 'post',
            url: '/system/authentication',
            data: credentials
        });
    };
    
    return{
        authenticate: authenticate
    }
}]);