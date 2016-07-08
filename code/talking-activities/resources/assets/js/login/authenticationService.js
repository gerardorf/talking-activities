talking.service('authenticationService', ['$http', function($http) {
    const ENDPOINT = '/system/authentication';

    var authenticate = function (credentials) {
        return $http.post(ENDPOINT, credentials);
    };
    
    return{
        authenticate: authenticate
    }
}]);