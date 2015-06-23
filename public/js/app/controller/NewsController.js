angular.module('teacherApp')
    .controller('NewsController', function($scope,$http,$routeParams,$window) {

        var item  = $routeParams.itemId;
        $scope.news = '';

        function init(){
            if( angular.isNumber(item) != null){

                $http.get('/pages/news/'+item)
                    .success(function(data){
                        $scope.news = data;
                        console.log(data);
                    });
            }

        }
        init();

        $scope.back = function () {

            $window.history.back();
        }

    });