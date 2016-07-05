talking.controller('welcomeController', ['$scope', '$cookies', function ($scope, $cookies) {
    
    $scope.welcomeMessage = false;
    
    var showWelcomeMessage = function () {
        if ($cookies.get('returningUser')===undefined){
            $scope.welcomeMessage = true;
            $cookies.put('returningUser', true);
        } 
    }
    
   showWelcomeMessage(); 
}]);
