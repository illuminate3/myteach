
 angular.module('teacherApp')
    .controller('homeworksEditController',function($scope,$http,homeworksFactory,$routeParams,$window,messageFactory){
         $scope.homeworks = {};
          var item  = $routeParams.itemId;
         function init(item){
             homeworksFactory.getSingleHomeworks(item)
                 .success(function(data){
                     $scope.homeworks = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/admin/exercises/' + item, JSON.stringify($scope.homeworks))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item updated successfully' });
                     $window.history.back();
                 });
         };
         $scope.cancelEdit = function(){
             $window.history.back();
         };


         $scope.loading = false;
         $scope.messageSuccess = '';
         $scope.Errorss = '';

         $scope.uploadFile = function(files) {
             $scope.messageSuccess = '';
             $scope.Errorss = '';
             console.log(files);
             if(files[0].size < 2048000) {
                 var fd = new FormData();
                 $scope.loading = true;
                 //Take the first selected file
                 fd.append("file", files[0]);
                 //console.log(fd);

                 $http.post('/admin/exercises/editUpload/'+item, fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loading = false;
                     init(item);
                     $scope.messageSuccess = 'Your file uploaded successfully';
                 }).error(function () {
                     $scope.loading = false;
                     $scope.Errorss = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.Errorss = 'Your file is bigger than 2 megabyte';

                 $window.alert('Your can not be bigger than 2 megabyte')
             }

         };
    });
