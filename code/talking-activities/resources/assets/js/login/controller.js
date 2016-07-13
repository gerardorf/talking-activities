talking.controller('loginController', function ($scope, $location, labelsFactory, authenticationService) {
    $scope.login = {
        email: '',
        password: ''
    };
    $scope.labels = labelsFactory.page();
    $scope.error = false;

    $scope.authenticate = function () {
        authenticationService.authenticate($scope.login)
            .then(validateSession)
            .then(goToStartPage)
            .catch(showErrorMessage);
    };

    var validateSession = function(response) {
        var token = response.data.token;
        authenticationService.saveToken(token);
        authenticationService.trackUser(token);
    };

    var goToStartPage = function () {
        $location.path('/welcome');
    };
    
    var showErrorMessage = function (response) {
        $scope.error = labelsFactory.error(response.data.error);
    };
});
