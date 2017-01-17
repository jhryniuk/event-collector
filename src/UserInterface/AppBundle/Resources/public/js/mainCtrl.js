var myApp = angular.module('myApp', [], function ($interpolateProvider) {

    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

myApp.controller("MyController", function ($scope) {

    $scope.updateClock = function () {
    
        $scope.clock = {};
        $scope.preclock = new Date();
        $scope.clock.hours = $scope.preclock.getHours();
        $scope.clock.minutes = $scope.preclock.getMinutes();
        $scope.clock.seconds = $scope.preclock.getSeconds();
        if ($scope.clock.hours < 10) {
            $scope.clock.hours = '0' + $scope.clock.hours;
        }
        if ($scope.clock.minutes < 10) {
            $scope.clock.minutes = '0' + $scope.clock.minutes;
        }
        if ($scope.clock.seconds < 10) {
            $scope.clock.seconds = '0' + $scope.clock.seconds;
        }
    }
    $scope.updateClock();

    setInterval(function () {
    
        $scope.$apply($scope.updateClock());
    }, 1000);

});

myApp.controller("UserController", function ($scope) {

    console.groupCollapsed('%cTest', 'color: red; font-size: 22px;');
    console.log('Teścik!!');
    console.groupEnd();
    $scope.prime = 3;
    $scope.setArr = function (counter) {
    
        $scope.arr = [];
        for (i = 0; i < counter; i++) {
            $scope.arr[i] = {'available':true, 'index': i};
            //console.log($scope.arr);
        }
        return $scope.arr;
    }

    $scope.arr = $scope.setArr($scope.prime);
    console.log($scope.arr);
});