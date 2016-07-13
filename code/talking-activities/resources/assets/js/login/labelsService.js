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
