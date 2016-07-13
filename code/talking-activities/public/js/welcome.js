talking.controller('welcomeController', function ($scope, $cookies, $location, welcomeLabelsFactory) {
    $scope.labels = welcomeLabelsFactory.page();
    $scope.showWMessage = false;
    $scope.message= {};
    
    $scope.hideMessage = function() {
        $scope.showMessage = false;
    };

    $scope.logout = function() {
        invalidateSession();
    };
    
    var showWelcomeMessage = function() {
        if (isANewUser()){
            printWelcomeMessage();
        }
    }();

    function invalidateSession() {
        $cookies.remove('user_token');
        redirectToLogin();
    }

    var redirectToLogin = function () {
        $location.path('/login');
    };

    function isANewUser() {
        return $cookies.get('returning_user') === undefined;
    }

    function printWelcomeMessage () {
        $scope.showMessage = true;
        $scope.message= welcomeLabelsFactory.welcome();
        doNotShowWelcomeMessageAgain();
    }

    function doNotShowWelcomeMessageAgain() {
        $cookies.put('returning_user', true);
    }
});

talking.factory('welcomeLabelsFactory', function(labelsService) {
    var pageLabel = function() {
        return labelsService.loadLabel('welcome.title.label');
    };

    var welcomeLabels= function() {
        return labelsService.loadLabels(['welcome.message.title',
            'welcome.message.body',
            'welcome.message.submit'
        ]);
    };

    return {
        page: pageLabel,
        welcome: welcomeLabels
    };
});
//# sourceMappingURL=welcome.js.map
