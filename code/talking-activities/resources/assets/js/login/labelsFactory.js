talking.factory('labelsFactory', ['labelsService', function(labelsService) {
    
    var pageLabels = function() {
        return labelsService.loadLabels(['login.mail.label',
            'login.password.label',
            'login.submit.label',
            'login.title.label'
        ]);
    };

    var errorLabel = function() {
        return labelsService.loadLabel('login.password.error');
    };

    return {
        page: pageLabels,
        error: errorLabel
    };
}]);
