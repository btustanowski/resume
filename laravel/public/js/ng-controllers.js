var appControllers = angular.module('appControllers', []);

appControllers.controller('LandingCtrl', ['$scope', 'service', function ($scope, service){

}]);

// Generic crud controller
appControllers.controller('SCrudCtrl', ['$route', '$scope', 'service', function ($route, $scope, service){
    service.collect();
    $scope.itemlist = [];
    $scope.activeItem = {};

    $scope.$watch(function() {return service.list();}, function(n, o) {
        if(n!==o) $scope.itemlist = n;
    });

    $scope.save = function () {
        if($scope.itemForm.$valid && $scope.itemForm.$dirty) {
            $('#itemModal').modal('hide');
            service.save($scope.activeItem).then(function() {
                service.collect();
            });
        }
    }

    $scope.destroyItem = function (item) {
        service.destroy(item.id).then(function() {
            service.collect();
        });
    }

    $scope.newItem = function () {
        $scope.popupTitle = 'New item';
        $scope.activeItem = {};
        $('#itemModal').modal('show');
    }

    $scope.editItem = function (item) {
        $scope.activeItem = item;
        $scope.popupTitle = 'Edit item';
        $('#itemModal').modal('show');
    }
}]);