talking.controller('welcomeController', ['$scope', '$cookies', 'welcomeLabelsFactory', function ($scope, $cookies, welcomeLabelsFactory) {
    $scope.showMessage = false;
    $scope.labels = {};
    
    var showWelcomeMessage = function () {
        if (isANewUser()){
            printWelcomeMessage();
        } 
    };
    
    showWelcomeMessage();
    
    function isANewUser() {
        return $cookies.get('returningUser') === undefined;
    }

    function printWelcomeMessage() {
        $scope.showMessage = true;
        $scope.labels = welcomeLabelsFactory.page();
        $cookies.put('returningUser', true);
    }
}]);
