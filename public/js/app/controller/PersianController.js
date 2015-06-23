angular.module('teacherApp')
    .controller('PersianController', function($scope,$http,$window) {

        $scope.persian = '';

        function init(){
            $http.get('/pages/persian')
                .success(function(data){
                    $scope.persian = data;
                    //console.log(data);
                });

        }
        init();
        $scope.back = function () {

            $window.history.back();
        }

    });