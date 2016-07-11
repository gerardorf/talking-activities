talking.controller('welcomeController', ['$scope', '$cookies', 'welcomeLabelsFactory', function ($scope, $cookies, welcomeLabelsFactory) {
    $scope.labels = {};
    $scope.showMessage = false;
    $scope.message= {};
    
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

talking.factory('welcomeLabelsFactory', ['labelsService', function(labelsService) {
    var pageLabel = function() {
        return labelsService.loadLabel('welcome.title.label');
    };

    var welcomeLabel= function() {
        console.log('load welcome message');
        return labelsService.loadLabel('welcome.message.label');
    };

    return {
        page: pageLabel,
        welcome: welcomeLabel
    };
}]);
//# sourceMappingURL=welcome.js.map
