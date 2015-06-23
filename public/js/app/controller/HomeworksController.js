angular.module('teacherApp')
    .controller('HomeworksController', function($scope,$http,$routeParams,$window) {

        var item  = $routeParams.itemId;
        $scope.homeworks ='';
        $scope.itemSelected='25';

        function init(){

            $http.get('/homeworks/'+ item)
                .success(function(data){
                    $scope.homeworks = data;
                    console.log(data);
                });

        }
        init();


        $scope.back = function () {

            $window.history.back();
        }

    });