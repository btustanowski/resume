btApp.service('User', function($http){
    var users = [];

    this.collect = function() {
        $http.get('/user/list').success(function(data) {
            users = data.users;
            return true;
        }).error(function() {
            alert('Error #4');
            return false;
        });
    };

    this.list = function() {
        return users;
    };

    this.save = function(input) {
        var promise = $http.post('/user/save', input).success(function(data) {
            return true;
        }).error(function() {
            alert('Error #5');
            return false;
        });
        return promise;
    };

    this.destroy = function(input) {
        var promise = $http.delete('/user/destroy/'+input).success(function(data) {
            if(data.error) {
                new PNotify({
                    title: 'Error',
                    text: data.error,
                    type: 'error'
                });
            }
            return true;
        }).error(function() {
            alert('Error #6');
            return false;
        });
        return promise;
    };
});

btApp.service('Education', function($http){
    var items = [];

    this.collect = function() {
        $http.get('/education/list').success(function(data) {
            items = data.entries;
            return true;
        }).error(function() {
            alert('Error #4');
            return false;
        });
    };

    this.list = function() {
        return items;
    };

    this.save = function(input) {
        var promise = $http.post('/education/save', input).success(function(data) {
            return true;
        }).error(function() {
            alert('Error #5');
            return false;
        });
        return promise;
    };

    this.destroy = function(input) {
        var promise = $http.delete('/education/destroy/'+input).success(function(data) {
            if(data.error) {
                new PNotify({
                    title: 'Error',
                    text: data.error,
                    type: 'error'
                });
            }
            return true;
        }).error(function() {
            alert('Error #6');
            return false;
        });
        return promise;
    };
});