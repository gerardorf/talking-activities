talking.controller('loginController', ['$scope', '$location', 'labelsFactory', 'authenticationService', function ($scope, $location, labelsFactory, authenticationService) {
    $scope.login = {
        email: '',
        password: ''
    };
    $scope.labels = labelsFactory.page();
    $scope.error = false;

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
