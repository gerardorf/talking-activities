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
