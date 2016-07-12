talking.controller('welcomeController', ['$scope', '$cookies', 'welcomeLabelsFactory', function ($scope, $cookies, welcomeLabelsFactory) {
    $scope.labels = {};
    $scope.showMessage = false;
    $scope.message= {};
    
    $scope.hideMessage = function() {
        $scope.showMessage = false;
    };
    
    var showWelcomeMessage = function() {
        loadLabel();
        if (isANewUser()){
            printWelcomeMessage();
        } 
    };
    
    showWelcomeMessage();

    function loadLabel() {
        $scope.labels = welcomeLabelsFactory.page();
    };

    function isANewUser() {
        return $cookies.get('returningUser') === undefined;
    }

    function printWelcomeMessage () {
        $scope.showMessage = true;
        $scope.message= welcomeLabelsFactory.welcome();
        $cookies.put('returningUser', true);
    }
}]);
