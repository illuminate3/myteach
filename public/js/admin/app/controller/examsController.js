
angular.module('teacherApp')
    .controller('examsController',function($scope,$route,$window,$http,messageFactory,$routeParams,$filter,coursesFactory,examsFactory){


        $scope.courses = [];
        $scope.courseSelected = '';
        $scope.showExam = false;
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
                $window.location.href= "#exams/" + $scope.courseSelected;
                //init($scope.courseSelected)
            }
        };

        $scope.exams = [];
        $scope.order = 'created_at';
        $scope.reverse = true;
        $scope.itemSelected='100';

        $scope.createExam = function () {
            $window.location.href = '#exams/create/' + $scope.courseSelected;
        };
        function init(course_id){
            console.log(course_id);
            examsFactory.getExams(course_id)

                .success(function(data){
                    $scope.exams = data;
                });
        }

        var foo = $route.current.foodata;
        console.log(foo);
        if(foo){
            var item  = $routeParams.courseId;
            $scope.showExam = true;
            $scope.courseSelected = item;
            console.log(item)
            init(item)
        }
        // $http.get('/admin/getNews').success(function(data){
        //     $scope.exams = data;
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
            examsFactory.active(id)
                .success(function(data){
                    console.log('aaaaaaaaaaa');
                    init($scope.courseSelected);
                });


        };
        $scope.deleteItem = function(id){
            console.log(id);
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                examsFactory.deleteItem(id)
                    .success(function (data) {
                        console.log('aaaaaaaaaaa');
                        init($scope.courseSelected);
                    });
            }
        };

        var activeArray = [];
        var ActiveObjects;
        $scope.selectedItems = function () {
            ActiveObjects = $filter('filter')($scope.exams, {checked: true});
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
            $http.post('/admin/exams/activeAll', JSON.stringify(activeArray))
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
                $http.post('/admin/exams/deleteAll', JSON.stringify(activeArray))
                    .success(function (data) {
                        console.log(data);
                        init($scope.courseSelected);
                    });
                activeArray = [];
            };
        }

/////////////////create new exam//////////////////////////////
        $scope.formData = {
            course_id: '' ,
            title: "",
            date: "",
            high_score: ""
        };
        resetFormdata = function(){
            $scope.formData.title='';
            $scope.formData.date='';
            $scope.formData.score='';
        };
        $scope.formData.course_id = item;
        //$scope.formData.date = new Date();
        $scope.errorMsgShow=false;
        $scope.submitCreatedForm = function(){
            $scope.errorMsg = "";
            $scope.errorMsgShow=false;
            console.log($scope.formData);
            $http.post('/admin/exams', JSON.stringify($scope.formData))
                .success(function(data){
                    /*success callback*/
                    console.log(data);
                    messageFactory.setSuccess({ show: true, msg: ' Your item Created successfully' });
                    console.log(messageFactory.getSuccess().msg+'aaaaaaa');
                    //$window.location.reload();
                    $window.location.href= "#/exams/"+item;
                    resetFormdata();
                    init(item);
                }).error(function(){
                    messageFactory.setError({ show: true, msg: 'This email is registered in this course' });
                    $window.location.href= "#/exams/"+item;
                    $scope.errorMsg = "Something went wrong, please repeat again";
                    $scope.errorMsgShow = true;
                });
        };
/////////////end of create new exam///////////////////////////////

    });
