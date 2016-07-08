talking.factory('labelsFactory', ['labelsService', function(labelsService) {
    
    var pageLabels = function() {
        return labelsService.loadLabels(['login.mail.label',
            'login.password.label',
            'login.submit.label',
            'login.title.label'
        ]);
    };

    var errorLabel = function(errorKey) {
        // return labelsService.loadLabel('login.password.error');
        return labelsService.loadLabel(errorKey);
    };

    return {
        page: pageLabels,
        error: errorLabel
    };
}]);
