
 angular.module('teacherApp')
    .controller('newsEditController',function($scope,$http,newsFactory,$routeParams,$window,messageFactory){
         $scope.news = {};
          var item  = $routeParams.itemId;
         function init(item){
             newsFactory.getSingleNews(item)
                 .success(function(data){
                     $scope.news = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/admin/latest/' + item, JSON.stringify($scope.news))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item updated successfully' });
                     $window.location.href= "#news";
                 });
         };
         $scope.cancelEdit = function(){
             $window.location.href= "#news";
         };
    });
