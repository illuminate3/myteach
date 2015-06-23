
 angular.module('teacherApp')
    .controller('studentsEmailController',function($scope,$http,studentsFactory,$routeParams,$window,messageFactory){
         $scope.students = {};
          var item  = $routeParams.itemId;
         function init(item){
             studentsFactory.getSingleStudents(item)
                 .success(function(data){
                     $scope.students = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.post('/admin/studentsEmail/' + item, JSON.stringify($scope.students))
                 .success(function(data){
                 /*success callback*/
                     //console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your email send successfully' });
                     //$window.location.href = '#/students'
                     $window.history.back();
                 });
         };
         $scope.cancelEdit = function(){
             $window.history.back();
         };
    });
