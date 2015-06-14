
 angular.module('teacherApp')
    .controller('examsPlotController',function($scope,$http,examsFactory,$routeParams,$window,messageFactory){
         $scope.exams = {};
         $scope.plotData = {};
          var item  = $routeParams.itemId;
          var exam_grades = [];
          var exam_students = [];
         var max_exam_grade = [];
         //var high_score = $scope.exams.high_score;
         $scope.average = null;
         var initPlotsData = function(){
             angular.forEach($scope.plotData, function (exam , key) {
                 exam_grades.push(exam.grade);
                 max_exam_grade.push($scope.exams.high_score);
                 exam_students.push(exam.students.name + '-' + exam.students.family);
             });
             $scope.labels = exam_students;
             $scope.series = ["Student's Grades"," Exam Max Grade"];
             $scope.data = [ exam_grades , max_exam_grade ];
            // $scope.options.bezierCurve = false;
             $scope.onClick = function (points, evt) {
                 console.log(points, evt);
             };
             console.log(exam_grades);
         };
         
         var calAverageGrade = function () {
             var sum = 0;
             for( var i = 0; i < exam_grades.length; i++ ){
                 sum += parseInt( exam_grades[i], 10 ); //don't forget to add the base
             }

             $scope.average = (sum / exam_grades.length).toFixed(2);

         }
         function init(item){
             examsFactory.getSingleExams(item)
                 .success(function(data){
                     $scope.exams = data;
                     console.log(data);
                 });
             $http.get('/admin/exams/grades/'+ item)
                 .success(function (data) {
                    $scope.plotData = data;
                     //console.log(data);
                     initPlotsData();
                     if(exam_grades.length > 1){
                         calAverageGrade();
                     }
                 });

         }
         init(item);



         //$scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
         //$scope.series = ['Series A', 'Series B'];
         //$scope.data = [
         //    [65, 59, 80, 81, 56, 55, 40],
         //    [28, 48, 40, 19, 86, 27, 90]
         //];
         //$scope.onClick = function (points, evt) {
         //    console.log(points, evt);
         //};
    });
