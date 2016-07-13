talking.service('authenticationService', function($http, $cookies) {
    const ENDPOINT = '/system/authentication';

    var authenticate = function(credentials){
        return $http.post(ENDPOINT, credentials);
    };
    
    var saveUserToken = function(token){
        $cookies.put('user_token', token);
    };

    var addToUserList = function(token){
        var username = extractUsername(token);
        save(username);
    };

    var extractUsername = function(token){
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace('-', '+').replace('_', '/');
        return JSON.parse(atob(base64)).username;
    };

    function getTrackedUsers() {
        var logged = $cookies.getObject('logged_users');
        if (logged === undefined) logged = [];
        return logged;
    }

    function save(user) {
        var tracked = getTrackedUsers();
        if (isANewUser(tracked, user)){
            tracked.push(user);
            $cookies.putObject('logged_users', tracked);
        }
    }

    function isANewUser(logged, user) {
        for(var i=0; i < logged.length; i++) {
            if(logged[i]===user) return false;
        }
        return true;
    }

    return{
        authenticate: authenticate,
        saveToken: saveUserToken,
        trackUser: addToUserList
    }
});
talking.controller('loginController', function ($scope, $location, labelsFactory, authenticationService) {
    $scope.login = {
        email: '',
        password: ''
    };
    $scope.labels = labelsFactory.page();
    $scope.error = false;

    $scope.authenticate = function () {
        authenticationService.authenticate($scope.login)
            .then(validateSession)
            .then(goToStartPage)
            .catch(showErrorMessage);
    };

    var validateSession = function(response) {
        var token = response.data.token;
        authenticationService.saveToken(token);
        authenticationService.trackUser(token);
    };

    var goToStartPage = function () {
        $location.path('/welcome');
    };
    
    var showErrorMessage = function (response) {
        $scope.error = labelsFactory.error(response.data.error);
    };
});

talking.factory('labelsFactory', function(labelsService) {
    
    var pageLabels = function() {
        return labelsService.loadLabels(['login.mail.label',
            'login.password.label',
            'login.submit.label',
            'login.title.label'
        ]);
    };

    var errorLabel = function(errorKey) {
        return labelsService.loadLabel(errorKey);
    };

    return {
        page: pageLabels,
        error: errorLabel
    };
});

talking.service('labelsService', function($http) {
    const ENDPOINT = '/system/labels';
    
    var loadLabel = function (key) {
        return loadLabels([key])
    };

    var loadLabels = function(keys) {
        var labels = {};
        request(keys)
            .then(function (response) {
                for (var i = 0; i < response.data.length; i++) {
                    labels[response.data[i].key] = response.data[i].value;
                }
            });
        return labels;
    };

    var request = function (keys) {
        return $http.post(ENDPOINT, {keys: keys});
    };
    
    return {
        loadLabel: loadLabel,
        loadLabels: loadLabels
    }
});

//# sourceMappingURL=login.js.map
