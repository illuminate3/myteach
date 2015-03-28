
 angular.module('teacherApp')
    .controller('examsEditController',function($scope,$http,examsFactory,$routeParams,$window,messageFactory){
         $scope.exams = {};
          var item  = $routeParams.itemId;
         function init(item){
             examsFactory.getSingleExams(item)
                 .success(function(data){
                     $scope.exams = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/admin/exams/' + item, JSON.stringify($scope.exams))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item updated successfully' });
                     //$window.location.href = '#/exams'
                     $window.history.back();
                 });
         };
         $scope.cancelEdit = function(){
             $window.history.back();
         };
    });
