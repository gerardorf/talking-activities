var app = angular.module('talking-activities',['ngCookies']);

app.controller('LoginController',['$scope','$http', '$cookies',function($scope,$http,$cookies){

    $scope.init = function () {
        $scope.loadLabel('login.mail.label');
        $scope.loadLabel('login.password.label');
        $scope.loadLabel('login.submit.label');
        $scope.loadLabel('login.title.label');
        $scope.loadLabel('login.email.error');
    }.bind($scope);

    $scope.login = {
        email: '',
        password:''
    };

    $scope.labels = {};

    $scope.error = false;
    
    $scope.welcomeMessage = false;

    $scope.loadLabel = function(key){
        $http({
            method:'post',
            url:'/system/labels',
            data: {key: key}
        })
        .success(function(response){
            $scope.labels[key] = response.value;
        }.bind($scope));
    };

    function isANewVisitor() {
        if ($cookies.get('show-welcome-message')==true){
            console.log('show welcome message');
            return true;
        } 
        console.log('dont show console message');
        return false;
    }

    var showWelcomeMessage = function () {
        $cookies.put('show-welcome-message','false');
        $scope.welcomeMessage = true;
    };
    
    $scope.authenticate = function(){
        $scope.error = '';
        $http({
            method:'post',
            url:'/system/authentication',
            data:$scope.login
        })
        .success(function(response){
            if(response.error){
                $scope.loadLabel(response.error);
                $scope.error = true;
                return;
            }
            console.log($cookies.get('show-welcome-message'));
            if (isANewVisitor()){
                showWelcomeMessage();
            }
            document.location = '/welcome';
        });
    }.bind($scope);

    $scope.init();
}]);