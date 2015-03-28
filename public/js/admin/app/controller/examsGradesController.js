
angular.module('teacherApp')
    .controller('examsGradesController',function($scope,$route,$window,$http,messageFactory,$routeParams,$filter,studentsFactory,$timeout,examsFactory,ngDialog){


        $scope.students = [];
        $scope.order = 'family';
        $scope.reverse = false;
        $scope.itemSelected='100';

        $scope.high_score = '';


        var courseId  = $routeParams.courseId;
        console.log(courseId+'aaaaaaaaaaa');
        var examId    = $routeParams.examId;
        $scope.subimtEmail = function () {
            console.log('click');
            ngDialog.open({
                template: '/js/admin/app/views/exams/grades/email.html',
                cache : false,
                controller: ['$scope', function($scope) {
                    $scope.exam_id=examId;
                    $scope.title='';
                    $scope.description='';

                    $scope.sendGradeEmail = function(id_exam){
                        $http({
                            method: "post",
                            url: '/admin/grades/emailAll',
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                            data: $.param({examId: id_exam, title: $scope.title, description: $scope.description})
                        }).success(function(result){
                            console.log(result);
                        });
                        console.log(id_exam + 'inside controller');
                    };
                    //console.log($scope.exam_id);
                }]
               // className: 'ngdialog-theme-default'
            });
        };
        console.log(examId+'aaaaaaaaaaa');
        function init(){
            console.log(courseId);
            studentsFactory.getStudentWithCourseIdAndExams(courseId,examId)

                .success(function(data){
                    $scope.students = data;
                   // console.log($scope.students);

                    /////////////////////////////////////
                    //$http.post('/admin/grades',$scope.students)
                    //    .success(function (result) {
                    //        console.log(result );
                    //    });
                    ///////////////////////////////////
                });
            examsFactory.getSingleExams(examId)
                .success(function (exam) {
                   $scope.high_score = exam.high_score;
                    console.log(exam.high_score + "exaaaaaaaaaam");
                });


        }
        init();


        $scope.sort = function(name){
            $scope.order = name;
            $scope.reverse = ! $scope.reverse;
        };

        var inputChangedPromise;
        $scope.loading = false;
        $scope.addGrade = function (id,grade) {



                if (inputChangedPromise) {
                    $timeout.cancel(inputChangedPromise);
                }
            var span = angular.element('span#'+id);
            var div = angular.element('div#'+id+'message');
            div.hide();
            if (grade < $scope.high_score || grade == $scope.high_score ) {
                inputChangedPromise = $timeout(function () {

                    console.log(span);
                    span.show();
                    console.log(grade);
                    // console.log($scope.students[3]);
                    $scope.loading = true;
                    $http({
                        method: "post",
                        url: '/admin/grades',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        data: $.param({student_id: id, grade: grade, exam_id: examId})
                    }).success(function (result) {
                        console.log(result);
                        span.hide();
                       // $scope.loading = false;
                    });
                }, 1000);
            }else{

                div.show();
            }
        }

        $scope.active = function(student){
            console.log(student);
            $http.get('/admin/grades/present/'+ student.id + '/' + examId)
                .success(function (result) {
                student.present = ! student.present;
                console.log(result);
            });
        };



});

