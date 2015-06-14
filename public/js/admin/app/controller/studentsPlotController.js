
 angular.module('teacherApp')
    .controller('studentsPlotController',function($scope,$http,studentsFactory,$routeParams,$window,messageFactory){
         $scope.student = {};
          var item  = $routeParams.itemId;
         var exam_grades = [];
         var exam_dates = [];
         var normalize  = [];
         $scope.plotData = '';
         //$scope.average = null;
         var initPlotsData = function(){
             angular.forEach($scope.plotData, function (exam , key) {
                 exam_grades.push( (exam.grade / exam.exams.high_score ).toFixed(2) );
                 normalize.push(1);
                 exam_dates.push(exam.exams.date);
             });
             $scope.labels = exam_dates;
             $scope.series = ["Student's Status","Normalized To 1"];
             $scope.data = [ exam_grades , normalize ];
             // $scope.options.bezierCurve = false;
             $scope.onClick = function (points, evt) {
                 console.log(points, evt);
             };
             console.log(exam_grades);
         };
         function init(item){
             studentsFactory.getSingleStudents(item)
                 .success(function(data){
                     $scope.student = data;
                 });

             $http.get('/admin/students/grades/'+ item)
                 .success(function (data) {
                     $scope.plotData = data;
                     if(data.length < 1){
                         messageFactory.setSuccess({ show: true, msg: ' This student does\'nt have any exam ' });
                         $window.history.back();
                     }
                     //console.log(data);
                     initPlotsData();
                 });
         }
         init(item);




    });
