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