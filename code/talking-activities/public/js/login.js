talking.service('authenticationService', ['$http', function($http) {
    const ENDPOINT = '/system/authentication';

    var authenticate = function (credentials) {
        return $http.post(ENDPOINT, credentials);
    };
    
    return{
        authenticate: authenticate
    }
}]);
talking.controller('loginController', ['$scope', '$location', 'labelsFactory', 'authenticationService', function ($scope, $location, labelsFactory, authenticationService) {
    $scope.login = {
        email: '',
        password: ''
    };
    $scope.labels = labelsFactory.page();
    $scope.error = false;
    $scope.welcomeMessage = false;


    $scope.authenticate = function () {
        authenticationService.authenticate($scope.login)
            .then(goToStartPage)
            .catch(showErrorMessage);
    };

    var goToStartPage = function () {
        $location.path('/welcome');
    };
    
    var showErrorMessage = function (response) {
        $scope.error = labelsFactory.error(response.data.error);
    };
}]);

talking.factory('labelsFactory', ['labelsService', function(labelsService) {
    
    var pageLabels = function() {
        return labelsService.loadLabels(['login.mail.label',
            'login.password.label',
            'login.submit.label',
            'login.title.label'
        ]);
    };

    var errorLabel = function(errorKey) {
        return labelsService.loadLabel(errorKey);
    };

    return {
        page: pageLabels,
        error: errorLabel
    };
}]);

talking.service('labelsService', ['$http', function($http) {
    const ENDPOINT = '/system/labels';
    
    var loadLabel = function (key) {
        return loadLabels([key])
    };

    var loadLabels = function(keys) {
        var labels = {};
        request(keys)
            .then(function (response) {
                for (var i = 0; i < response.data.length; i++) {
                    labels[response.data[i].key] = response.data[i].value;
                }
            });
        return labels;
    };

    var request = function (keys) {
        return $http.post(ENDPOINT, {keys: keys});
    };
    
    return {
        loadLabel: loadLabel,
        loadLabels: loadLabels
    }
}]);

//# sourceMappingURL=login.js.map
