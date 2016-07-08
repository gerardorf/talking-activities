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
            .success(function (response) {
                console.log(response);
                if (response.error) {
                    $scope.error = labelsFactory.error();
                } else{
                    $location.path('/welcome');
                }
            });
    }.bind($scope);

    var merge = function (obj1,obj2){
        var obj3 = {};
        for (var attrname in obj1) { obj3[attrname] = obj1[attrname]; }
        for (var attrname in obj2) { obj3[attrname] = obj2[attrname]; }
        console.log(obj3);
        return obj3;
    };
}]);
