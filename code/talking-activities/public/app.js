var app = angular.module('talking-activities',[]);

app.controller('LoginController',['$scope','$http',function($scope,$http){

    $scope.init = function () {
        $scope.obtainLabel('login.mail.label');
        $scope.obtainLabel('login.password.label');
        $scope.obtainLabel('login.submit.label');
        $scope.obtainLabel('login.title.label');
    }.bind($scope);


    $scope.login = {
        email: '',
        password:''
    };

    $scope.labels = {};

    $scope.error = '';

    $scope.obtainLabel = function(key){
        $http({
            method:'post',
            url:'/system/labels',
            data: {key: key}
        })
        .success(function(response){
            $scope.labels[key] = response.value;
        }.bind($scope));
    };

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

    $scope.init();
}]);