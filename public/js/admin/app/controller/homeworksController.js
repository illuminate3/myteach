
angular.module('teacherApp')
    .controller('homeworksController',function($scope,$route,$window,$http,messageFactory,$routeParams,$filter,coursesFactory,homeworksFactory){

        $scope.courses = [];
        $scope.courseSelected = '';
        $scope.showHomework = false;
        function initCourses(){
            coursesFactory.getCourses()
                .success(function(data){
                    $scope.courses = data;
                    //console.log(data);
                });
        }
        initCourses();
        $scope.courseChange = function(){
            if($scope.courseSelected){
                $scope.showHomework = true;
                $window.location.href= "#homeworks/" + $scope.courseSelected;
                //init($scope.courseSelected)
            }
        };

        $scope.homeworks = [];
        $scope.order = 'title';
        $scope.reverse = false;
        $scope.itemSelected='10';

        $scope.createHomework = function () {
            $window.location.href = '#homeworks/create/' + $scope.courseSelected;
        };
        function init(course_id){
            console.log(course_id);
            homeworksFactory.getCourses(course_id)

                .success(function(data){
                    $scope.homeworks = data;
                });
        }

        var foo = $route.current.foodata;
        console.log(foo);
        if(foo){
            var item  = $routeParams.courseId;
            $scope.showHomework = true;
            $scope.courseSelected = item;
            console.log(item)
            init(item)
        }
        // $http.get('/admin/getNews').success(function(data){
        //     $scope.homeworks = data;
        //});
        $scope.sort = function(name){
            $scope.order = name;
            $scope.reverse = ! $scope.reverse;
        };

        if (messageFactory.hasAlert()) {
            $scope.success = messageFactory.getSuccess();
            messageFactory.reset();
        }

        $scope.active = function(id){
            console.log(id);
            homeworksFactory.active(id)
                .success(function(data){
                    console.log('aaaaaaaaaaa');
                    init($scope.courseSelected);
                });


        };
        $scope.deleteItem = function(id){
            console.log(id);
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                homeworksFactory.deleteItem(id)
                    .success(function (data) {
                        console.log('aaaaaaaaaaa');
                        init($scope.courseSelected);
                    });
            }
        };

        var activeArray = [];
        var ActiveObjects;
        $scope.selectedItems = function () {
            ActiveObjects = $filter('filter')($scope.homeworks, {checked: true});
            console.log(ActiveObjects);
            // for(var i=0;i<$scope.ActiveObjects.length;i++) {
            //     $http.post('/admin/latest/activeAll', JSON.stringify($scope.ActiveObjects[0]))
            //         .success(function (data) {
            //             console.log(data);
            //         });
            //}
        }
        $scope.activeAll = function(){
            for(var i=0; i < ActiveObjects.length ; i++){
                activeArray.push((ActiveObjects[i].id));
            }
            console.log(activeArray);
            $http.post('/admin/exercises/activeAll', JSON.stringify(activeArray))
                .success(function (data) {
                    console.log(data);
                    init($scope.courseSelected);
                });
            activeArray = [];

        };

        $scope.deleteAll = function() {
            var a = window.confirm('Are you Sure you want to delete this item?');
            if (a) {
                for (var i = 0; i < ActiveObjects.length; i++) {
                    activeArray.push((ActiveObjects[i].id));
                }
                console.log(activeArray);
                $http.post('/admin/exercises/deleteAll', JSON.stringify(activeArray))
                    .success(function (data) {
                        console.log(data);
                        init($scope.courseSelected);
                    });
                activeArray = [];
            };
        }


    });
