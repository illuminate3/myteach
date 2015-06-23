angular.module('teacherApp')
    .controller('HomeController', function($scope,$http,$window) {

        $scope.homepage = '';
        $scope.news = '';

        function init(){
            $http.get('/pages/home')
                .success(function(data){
                    $scope.homepage = data;
                    //console.log(data);
                });

            $http.get('/pages/news')
                .success(function(data){
                    $scope.news = data;
                    console.log(data);
                });
        }
        init();

    });