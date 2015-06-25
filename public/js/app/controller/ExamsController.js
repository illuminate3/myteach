
angular.module('teacherApp')
    .controller('ExamsController',function($scope,$route,$window,$http,$routeParams,$filter){


        $scope.courses = [];
        $scope.courseSelected = '';
        $scope.showExam = false;
        function initCourses(){
            $http.get('/courses/all')
                .success(function(data){
                    $scope.courses = data;
                    //console.log(data);
                });
        }
        initCourses();
        $scope.courseChange = function(){
            if($scope.courseSelected){
                $scope.showStudent = true;
                $window.location.href= "#quiz/" + $scope.courseSelected;
                //init($scope.courseSelected)
            }
        };

        $scope.exams = [];
        $scope.order = 'date';
        $scope.reverse = true;
        $scope.itemSelected='100';

        function init(course_id){
            console.log(course_id);
            $http.get('/exams/' +course_id)
                .success(function(data){
                    $scope.exams = data;
                });
        };

        var foo = $route.current.foodata;
        console.log(foo);
        if(foo){
            var item  = $routeParams.courseId;
            $scope.showExam = true;
            $scope.courseSelected = item;
            console.log(item)
            init(item)
        }

        $scope.sort = function(name){
            $scope.order = name;
            $scope.reverse = ! $scope.reverse;
        };

    });
