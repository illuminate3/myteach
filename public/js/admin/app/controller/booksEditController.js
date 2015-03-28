
 angular.module('teacherApp')
    .controller('booksEditController',function($scope,$http,booksFactory,$routeParams,$window,messageFactory){
         $scope.books = {};
          var item  = $routeParams.itemId;
         function init(item){
             booksFactory.getSingleBooks(item)
                 .success(function(data){
                     $scope.books = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/admin/books/' + item, JSON.stringify($scope.books))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item updated successfully' });
                     $window.location.href= "#books";
                 });
         };
         $scope.cancelEdit = function(){
             $window.location.href= "#books";
         };
    });
