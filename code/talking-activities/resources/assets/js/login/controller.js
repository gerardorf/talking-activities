talking.controller('loginController', ['$scope', '$location', 'labelsFactory', 'labelsService', 'authenticationService', function ($scope, $location, labelsFactory, labelsService, authenticationService) {
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
        $scope.error = labelsFactory.error();
    };
}]);
