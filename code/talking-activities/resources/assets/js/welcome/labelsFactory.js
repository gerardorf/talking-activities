talking.factory('welcomeLabelsFactory', ['labelsService', function(labelsService) {
    var pageLabel = function() {
        return labelsService.loadLabel('welcome.title.label');
    };

    var welcomeLabels= function() {
        console.log('load welcome message');
        return labelsService.loadLabels(['welcome.message.title',
            'welcome.message.body',
            'welcome.message.submit'
        ]);
        
    };

    return {
        page: pageLabel,
        welcome: welcomeLabels
    };
}]);