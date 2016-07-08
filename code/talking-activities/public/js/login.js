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
talking.controller('loginController', ['$scope', '$cookies', '$location', 'labelsFactory', 'labelsService', 'authenticationService', function ($scope, $cookies, $location, labelsFactory, labelsService, authenticationService) {
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

    var showError = function () {
        console.log('showError');
    };
    
    var goToStartPage = function () {
        $location.path('/welcome');
    }
    
    var showErrorMessage = function (response) {
        console.log(response.data);
        if (response.data.error) {
            $scope.error = labelsFactory.error();
        } else {
            $location.path('/welcome');
        }
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

    var errorLabel = function() {
        return labelsService.loadLabel('login.password.error');
    };

    return {
        page: pageLabels,
        error: errorLabel
    };
}]);

talking.service('labelsService', ['$http', function($http) {
   
    var loadLabel = function (key) {
        return loadLabels([key])
    };

    var loadLabels = function(keys) {
        var labels = {};
        request(keys)
            .success(function (response) {
                for (var i = 0; i < response.length; i++) {
                    labels[response[i].key] = response[i].value;
                }
            });
        return labels;
    };

    var request = function (keys) {
        return $http({
            method: 'post',
            url: '/system/labels',
            data: {keys: keys}
        });
    };
    
    return {
        loadLabel: loadLabel,
        loadLabels: loadLabels
    }
}]);

//# sourceMappingURL=login.js.map
