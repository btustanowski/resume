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


var crudServices = [
    {
        serviceName: 'Education',
        controllerName: 'education'
    },
    {
        serviceName: 'Experience',
        controllerName: 'experience'
    },
    {
        serviceName: 'Personal',
        controllerName: 'personal'
    },
    {
        serviceName: 'Config',
        controllerName: 'config'
    },
    {
        serviceName: 'Interest',
        controllerName: 'interest'
    },
    {
        serviceName: 'Testimonial',
        controllerName: 'testimonial'
    },
    {
        serviceName: 'Skill',
        controllerName: 'skill'
    },
    {
        serviceName: 'Sample',
        controllerName: 'sample'
    }
];


var buildService = function(serviceName, controllerName) {

    btApp.service(serviceName, function($http){
        var items = [];

        this.collect = function() {
            $http.get(controllerName + '/list').success(function(data) {
                items = data.entries;
                return true;
            }).error(function() {
                    alert('Error retrieving ' + serviceName + ' elements.');
                    return false;
                });
        };

        this.list = function() {
            return items;
        };

        this.save = function(input) {
            var promise = $http.post(controllerName + '/save', input).success(function(data) {
                return true;
            }).error(function() {
                    alert('Error saving ' + serviceName + ' element.');
                    return false;
                });
            return promise;
        };

        this.destroy = function(input) {
            var promise = $http.delete(controllerName + '/destroy/'+input).success(function(data) {
                if(data.error) {
                    new PNotify({
                        title: 'Error',
                        text: data.error,
                        type: 'error'
                    });
                }
                return true;
            }).error(function() {
                    alert('Error removing ' + serviceName + ' element.');
                    return false;
                });
            return promise;
        };
    });
}


for (i in crudServices) {
    buildService(crudServices[i].serviceName, crudServices[i].controllerName);
}