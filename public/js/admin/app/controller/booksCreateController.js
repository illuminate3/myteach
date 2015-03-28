
 angular.module('teacherApp')
    .controller('booksCreateController',function($scope,$http,booksFactory,$routeParams,$window,messageFactory){
         $scope.formData = {
             title: "",
             intro: "",
             description: ""
         };


         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/admin/books', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item updated successfully' });
                     $window.location.href= "#books";
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#books";
         };
    });
