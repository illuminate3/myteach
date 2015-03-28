
 angular.module('teacherApp')
    .controller('newsCreateController',function($scope,$http,newsFactory,$routeParams,$window,messageFactory){
         $scope.formData = {
             title: "default",
             intro: "default",
             description: "default"
         };


         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/admin/latest/', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item updated successfully' });
                     $window.location.href= "#news";
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#news";
         };
    });
