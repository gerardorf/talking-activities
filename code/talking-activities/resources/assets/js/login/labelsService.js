talking.service('labelsService', ['$http', function($http) {
   
    var loadLabel = function (key) {
        return loadLabels([key])
    };

    var loadLabels = function(keys) {
        var labels = {};
        request(keys)
            .success(function (response) {
                for (var i = 0; i < response.length; i++) {
                    labels[response[i].key] = response[i].value;
                }
            });
        return labels;
    };

    var request = function (keys) {
        return $http({
            method: 'post',
            url: '/system/labels',
            data: {keys: keys}
        });
    };
    
    return {
        loadLabel: loadLabel,
        loadLabels: loadLabels
    }
}]);
