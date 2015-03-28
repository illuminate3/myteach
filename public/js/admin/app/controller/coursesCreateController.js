
 angular.module('teacherApp')
    .controller('coursesCreateController',function($scope,$http,coursesFactory,$routeParams,$window,messageFactory,booksFactory){
         $scope.formData = {
             year: "",
             semester: "",
             book_id: ""
         };
         $scope.books = [];

         var init = function () {
             booksFactory.getBooks()
                 .success(function (data) {
                     $scope.books = data;
                     console.log('sdafsaf');
                 });
         };
         init();


         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/admin/courses', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item Created successfully' });
                     $window.location.href= "#courses";
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#courses";
         };
    });
