
angular.module('teacherApp')
    .controller('studentsController',function($scope,$route,$window,$http,messageFactory,$routeParams,$filter,coursesFactory,studentsFactory){


        $scope.courses = [];
        $scope.courseSelected = '';
        $scope.showStudent = false;
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
                $scope.showStudent = true;
                $window.location.href= "#students/" + $scope.courseSelected;
                //init($scope.courseSelected)
            }
        };

        $scope.students = [];
        $scope.order = 'created_at';
        $scope.reverse = true;
        $scope.itemSelected='10';

        $scope.createStudent = function () {
            $window.location.href = '#students/create/' + $scope.courseSelected;
        };
        function init(course_id){
            console.log(course_id);
            studentsFactory.getStudents(course_id)

                .success(function(data){
                    $scope.students = data;
                });
        }

        var foo = $route.current.foodata;
        console.log(foo);
        if(foo){
            var item  = $routeParams.courseId;
            $scope.showStudent = true;
            $scope.courseSelected = item;
            console.log(item)
            init(item)
        }
        // $http.get('/admin/getNews').success(function(data){
        //     $scope.students = data;
        //});
        $scope.sort = function(name){
            $scope.order = name;
            $scope.reverse = ! $scope.reverse;
        };
        //console.log(messageFactory.hasAlert() +'dfsfdff');
        if (messageFactory.hasAlert()) {

            $scope.success = messageFactory.getSuccess();
            messageFactory.reset();
        }

        $scope.active = function(id){
            console.log(id);
            studentsFactory.active(id)
                .success(function(data){
                    console.log('aaaaaaaaaaa');
                    init($scope.courseSelected);
                });


        };
        $scope.deleteItem = function(id){
            console.log(id);
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                studentsFactory.deleteItem(id)
                    .success(function (data) {
                        console.log('aaaaaaaaaaa');
                        init($scope.courseSelected);
                    });
            }
        };

        var activeArray = [];
        var ActiveObjects;
        $scope.selectedItems = function () {
            ActiveObjects = $filter('filter')($scope.students, {checked: true});
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
            $http.post('/admin/students/activeAll', JSON.stringify(activeArray))
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
                $http.post('/admin/students/deleteAll', JSON.stringify(activeArray))
                    .success(function (data) {
                        console.log(data);
                        init($scope.courseSelected);
                    });
                activeArray = [];
            };
        }

/////////////////create new student//////////////////////////////
        $scope.formData = {
            course_id: '' ,
            name: "",
            family: "",
            email: ""
        };
        resetFormdata = function(){
            $scope.formData.name='';
            $scope.formData.family='';
            $scope.formData.email='';
        };
        $scope.formData.course_id = item;

        $scope.errorMsgShow=false;
        $scope.submitCreatedForm = function(){
            $scope.errorMsg = "";
            $scope.errorMsgShow=false;
            console.log($scope.formData);
            $http.post('/admin/students', JSON.stringify($scope.formData))
                .success(function(data){
                    /*success callback*/
                    console.log(data);
                    messageFactory.setSuccess({ show: true, msg: ' Your item Created successfully' });
                    console.log(messageFactory.getSuccess().msg+'aaaaaaa');
                    //$window.location.reload();
                    $window.location.href= "#/students/"+item;
                    resetFormdata();
                    init(item);
                }).error(function(){
                    messageFactory.setError({ show: true, msg: 'This email is registered in this course' });
                    $window.location.href= "#/students/"+item;
                    $scope.errorMsg = "This email is registered in this course!!";
                    $scope.errorMsgShow = true;
                });
        };
///////////////end of create new student///////////////////////////////

    });
