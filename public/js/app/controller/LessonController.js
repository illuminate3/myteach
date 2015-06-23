angular.module('teacherApp')
    .controller('LessonController', function($scope,$http,$routeParams,$window) {

        var item  = $routeParams.itemId;
        $scope.lesson ='';
        $scope.itemSelected='25';

        function init(){

            $http.get('/lesson/'+ item)
                .success(function(data){
                    $scope.lesson = data;
                    console.log(data);
                });

        }
        init();


        $scope.back = function () {

            $window.history.back();
        }

    });