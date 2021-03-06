
 angular.module('teacherApp')
    .controller('coursesEmailController',function($scope,$http,coursesFactory,$routeParams,$window,messageFactory){
         $scope.courses = {};
          var item  = $routeParams.itemId;
         function init(item){
             coursesFactory.getSingleCourses(item)
                 .success(function(data){
                     $scope.courses = data[0];
                 });
         }
         init(item);

         $scope.submitForm = function(){
             //console.log("posting data....");
             $http.post('/admin/coursesEmail/' + item, JSON.stringify($scope.courses))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your email sent successfully' });
                     $window.location.href= "#courses";
                 });
         };
         $scope.cancelEdit = function(){
             $window.location.href= "#courses";
         };
    });
