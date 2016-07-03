var app = angular.module('talking-activities',['ngCookies']);

app.controller('LoginController',['$scope','$http', '$cookies',function($scope,$http,$cookies){

    $scope.init = function () {
        $scope.loadLabels(['login.mail.label',
            'login.password.label',
            'login.submit.label',
            'login.title.label',
            ]);
    }.bind($scope);

    $scope.login = {
        email: '',
        password:''
    };

    $scope.labels = {};

    $scope.error = false;
    
    $scope.welcomeMessage = false;

    $scope.loadLabels= function(keys){
        $http({
            method:'post',
            url:'/system/labels',
            data: {keys: keys}
        })
        .success(function(response){
            for(var i=0; i<response.length; i++)
            {
                $scope.labels[response[i].key] = response[i].value;
            }
        }.bind($scope));
    };

    $scope.loadLabel = function (key) {
        $scope.loadLabels([key])
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
            console.log(response);
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