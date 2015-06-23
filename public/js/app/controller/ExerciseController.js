angular.module('teacherApp')
    .controller('ExerciseController', function($scope,$http,$routeParams,$window) {

        var item  = $routeParams.itemId;
        $scope.exercise ='';
        $scope.itemSelected='25';

        function init(){

            $http.get('/exercise/'+ item)
                .success(function(data){
                    $scope.exercise = data;
                    console.log(data);
                });

        }
        init();


        $scope.back = function () {

            $window.history.back();
        }

    });