angular.module('teacherApp')
    .controller('CvController', function($scope,$http,$window) {

        $scope.cv = '';

        function init(){
            $http.get('/pages/cv')
                .success(function(data){
                    $scope.cv = data;
                    //console.log(data);
                });

        }
        init();

        $scope.back = function () {

            $window.history.back();
        }

    });