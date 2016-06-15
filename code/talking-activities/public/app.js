var app = angular.module('talking-activities',[]);

app.controller('LoginController',['$scope','$http',function($scope,$http){
    $scope.login = {
        email: '',
        password:''
    };

    $scope.error = '';

    $scope.authenticate = function(){
        $scope.error = '';
        $http({
            method:'post',
            url:'/system/authentication',
            data:$scope.login
        })
            .success(function(response){
                var token = response.token;
                if(token == ''){
                    $scope.error = response.error;
                    return;
                }
                document.location = '/welcome';
            });
    }.bind($scope);
}]);