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