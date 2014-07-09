var appControllers = angular.module('appControllers', []);

appControllers.controller('LandingCtrl', ['$scope', '$location', function ($scope, $location, Auth, Nav){

}]);

appControllers.controller('UserCtrl', ['$route', '$scope', 'User', function ($route, $scope, User){
    User.collect();
    $scope.users = User.list();
    $scope.activeUser = {};
    $scope.popupTitle = '';

    $scope.$watch(function() {return User.list();}, function(n, o) {
        if(n!==o) $scope.users = n;
    });

    $scope.save = function () {
        if($scope.userForm.$valid && $scope.userForm.$dirty) {
            $('#usersModal').modal('hide');
            User.save($scope.activeUser).then(function() {
                User.collect();
            });
        }
    }

    $scope.destroy = function (user) {
        User.destroy(user.id).then(function() {
            User.collect();
        });
    }

    $scope.newUser = function () {
        $scope.popupTitle = 'Nowy użytkownik';
        $scope.activeUser = {};
        $('#usersModal').modal('show');
    }

    $scope.editUser = function (user) {
        $scope.activeUser = user;
        $scope.popupTitle = $scope.activeUser.name;
        $('#usersModal').modal('show');
    }
}]);

appControllers.controller('WordCtrl', ['$route', '$scope', 'Word', 'filterFilter', function ($route, $scope, Word, filterFilter){
    Word.collect();
    $scope.words = [];
    $scope.activeWord = {};
    $scope.popupTitle = '';
    $scope.perPage = 30;

    $scope.$watch(function() {return Word.list();}, function(n, o) {
        if(n!==o) {
            $scope.words = n;
            $scope.filtered = filterFilter($scope.words, $scope.srch);
            $scope.noOfPages = Math.ceil($scope.filtered.length/$scope.perPage);
        }
    });

    $scope.save = function () {
        if($scope.wordForm.$valid) {
            $('#wordModal').modal('hide');
            Word.save($scope.activeWord).then(function() {
                Word.collect();
            });
        }
    }

    $scope.destroy = function (word) {
        Word.destroy(word.id).then(function() {
            Word.collect();
        });
    }

    $scope.newWord = function () {
        $scope.popupTitle = 'New word';
        $scope.activeWord = {};
        $scope.activeWord.definitions = [];
        $('#wordModal').modal('show');
    }

    $scope.newDefinition = function () {
        $scope.activeWord.definitions.push({});

        setTimeout(function() {
            $('input[name=entry]:last').focus();
        }, 50);
    }

    $scope.destroyDefinition = function (definition) {
        $scope.activeWord.definitions.splice( $scope.activeWord.definitions.indexOf(definition), 1 );
    }

    $scope.editWord = function (word) {
        $scope.activeWord = word;
        $scope.popupTitle = 'Edit word';
        $('#wordModal').modal('show');
    }

    // Pagination
    $scope.$watch('srch', function(term) {
        $scope.filtered = filterFilter($scope.words, term);
        $scope.noOfPages = Math.ceil($scope.filtered.length/$scope.entryLimit);
    });

    $scope.currentPage = 1;
    $scope.paginate = function(value) {
        var begin, end, index;
        begin = ($scope.currentPage - 1) * $scope.perPage;
        end = begin + $scope.perPage;
        index = $scope.filtered.indexOf(value);
        return (begin <= index && index < end);
    };
}]);


appControllers.controller('PracticeCtrl', ['$route', '$scope', 'Practice', function ($route, $scope, Practice){
    Practice.collect(false);
    $scope.activeWord = {};
    $scope.fields = [];
    $scope.errors = [];
    $scope.attempt = 0;
    $scope.today = {
        'correct': [],
        'wrong': []
    };

    $scope.$watch(function() {return Practice.word();}, function(n, o) {
        if(n!==o) {
            $scope.activeWord = n;
            $scope.attempt = 1;
            $scope.fields = [];
            $scope.errors = [];
            angular.forEach(n.definitions, function(value, key) {
                if (value.lang == 'en') this.push({});
            }, $scope.fields);
            setTimeout(function() {
                $('input[name=entry]:first').focus();
            }, 50);
        }
    });

    $scope.submit = function() {
        if($scope.practiceForm.$valid) {
            Practice.try({'fields':$scope.fields, 'attempt':$scope.attempt}).then(function(r) {
                var fields = r.data.fields;
                var passed = true;
                $scope.fields = fields;
                for (i in fields) {
                    if (fields[i].status == 'wrong') {
                        passed = false;
                        $scope.errors.push(fields[i].value);
                        fields[i].value = '';
                    }
                }

                if(passed) {
                    $scope.today.correct.push($scope.activeWord);
                    Practice.collect(false);
                } else {
                    if ($scope.attempt++ >= 3) {
                        $scope.today.wrong.push($scope.activeWord);
                        Practice.collect(true);
                    }
                }

                setTimeout(function() {
                    $('input[name=entry]:first').focus();
                }, 50);
            });
        }
    }

    $scope.forfeit = function() {
        $scope.today.wrong.push($scope.activeWord);
        Practice.collect(true);
        setTimeout(function() {
            $('input[name=entry]:first').focus();
        }, 50);
    }
}]);

appControllers.controller('TestCtrl', ['$route', '$scope', 'Test', function ($route, $scope, Test){
    Test.collect();
    $scope.activeTest = {};
    $scope.loading = false;
    $scope.tests = [];

    $scope.$watch(function() {return Test.test();}, function(n, o) {
        if(n!==o) $scope.activeTest = n;
    });
    $scope.$watch(function() {return Test.tests();}, function(n, o) {
        if(n!==o) $scope.tests = n;
    });

    $scope.submitStart = function() {
        if($scope.testFormStart.$valid) {
            $scope.loading = true;
            Test.start({'wordcount':$scope.wordCount}).then(function(r) {
                if(r.data.test == 'started') {
                    $route.reload();
                }
            });
        }
    }

    $scope.submitTest = function() {
        if($scope.testForm.$valid) {
            $scope.loading = true;
            Test.complete({'fields':$scope.activeTest.words}).then(function(r) {
                if(r.data.test == 'marked') {
                    $route.reload();
                }
            });
        }
    }
}]);