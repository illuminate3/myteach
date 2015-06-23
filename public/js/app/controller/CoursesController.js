angular.module('teacherApp')
    .controller('CoursesController', function($scope,$http,$routeParams,$window) {

        //var item  = $routeParams.itemId;
        $scope.courses = '';
        $scope.itemFilter = '';
        $scope.order = 'year';
        $scope.reverse = true;
        $scope.itemSelected='25';

        function init(){

            $http.get('/courses/all')
                .success(function(data){
                    $scope.courses = data;
                    console.log(data);
                });

        }
        init();

        $scope.sort = function(name){
            $scope.order = name;
            $scope.reverse = ! $scope.reverse;
        };

        $scope.back = function () {

            $window.history.back();
        }

    });