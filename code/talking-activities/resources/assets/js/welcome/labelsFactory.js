talking.factory('welcomeLabelsFactory', ['labelsService', function(labelsService) {
    var pageLabels = function() {
        console.log('load welcome message');
        return labelsService.loadLabel('welcome.message.label');
    };

    return {
        page: pageLabels
    };
}]);