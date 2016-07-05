talking.controller('loginController', ['$scope', '$http', '$cookies', '$location', function ($scope, $http, $cookies, $location) {
    $scope.login = {
        email: '',
        password:''
    };
    $scope.labels = {};
    $scope.error = false;
    $scope.welcomeMessage = false;
    
    var init = function () {
        loadLabels(['login.mail.label',
            'login.password.label',
            'login.submit.label',
            'login.title.label'
        ]);
    };

    var loadLabel = function (key) {
        loadLabels([key])
    };
    
    var loadLabels = function(keys){
        $http({
            method:'post',
            url:'/system/labels',
            data: {keys: keys}
        })
        .success(function(response){
            for(var i=0; i<response.length; i++){
                $scope.labels[response[i].key] = response[i].value;
            }
        }.bind($scope));
    };

    $scope.authenticate = function(){
        $scope.error = false; 
        $http({
            method:'post',
            url:'/system/authentication',
            data:$scope.login
        })
        .success(function(response){
            console.log(response);
            if(response.error){
                loadLabel(response.error);
                $scope.error = true;
                return;
            }
            $cookies.put('jwtToken', response);
            $location.path('/welcome');
        });
    };
    
    init();
}]);


//# sourceMappingURL=login.js.map
