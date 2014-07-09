var appServices = angular.module('appServices', []);

appServices.service('User', function($http){
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
                    title: 'Błąd',
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

appServices.service('Word', function($http){
    var words = [];

    this.collect = function() {
        $http.get('/word/list').success(function(data) {
            words = data.words;
            return true;
        }).error(function() {
            alert('Error #4');
            return false;
        });
    };

    this.list = function() {
        return words;
    };

    this.save = function(input) {
        var promise = $http.post('/word/save', input).success(function(data) {
            return true;
        }).error(function() {
            alert('Error #5');
            return false;
        });
        return promise;
    };

    this.destroy = function(input) {
        var promise = $http.delete('/word/destroy/'+input).success(function(data) {
            if(data.error) {
                new PNotify({
                    title: 'Błąd',
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

appServices.service('Practice', function($http){
    var word = {};

    this.collect = function(input) {
        $http.get('/practice/word'+((input)?'/force':'')).success(function(data) {
            word = data.word;
            return true;
        }).error(function() {
            alert('Error #4');
            return false;
        });
    };

    this.try = function(input) {
        var promise = $http.post('/practice/try', input).success(function(data) {
            return true;
        }).error(function() {
            alert('Error #5');
            return false;
        });
        return promise;
    };

    this.fail = function() {
        var promise = $http.post('/practice/fail').success(function(data) {
            return true;
        }).error(function() {
            alert('Error #5');
            return false;
        });
        return promise;
    };

    this.word = function() {
        return word;
    };
});



appServices.service('Test', function($http){
    var test = {};
    var tests = {};

    this.collect = function() {
        $http.get('/test/active').success(function(data) {
            test = data.test;
        }).error(function() {
            alert('Error #6');
        });

        $http.get('/test/last').success(function(data) {
            tests = data.tests;
        }).error(function() {
            alert('Error #6');
        });
    };

    this.start = function(input) {
        var promise = $http.post('/test/begin', input).success(function(data) {
            return true;
        }).error(function() {
            alert('Error #7');
            return false;
        });
        return promise;
    };

    this.complete = function(input) {
        var promise = $http.post('/test/complete', input).success(function(data) {
            return true;
        }).error(function() {
            alert('Error #8');
            return false;
        });
        return promise;
    };

    this.test = function() {
        return test;
    };
    this.tests = function() {
        return tests;
    };
});