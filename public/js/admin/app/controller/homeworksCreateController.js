
 angular.module('teacherApp')
    .controller('homeworksCreateController',function($scope,$http,homeworksFactory,$routeParams,$window,messageFactory){
         $scope.formData = {
             course_id:'',
             title: "",
             description: "",
             file : ""
         };
         $scope.formData.course_id = $routeParams.courseId;
         $scope.loading = false;
         $scope.messageSuccess = '';
         $scope.Errorss = '';


         $scope.uploadFile = function(files) {
             $scope.messageSuccess = '';
             $scope.Errorss = '';
             if(files[0].size < 2048000) {
                 var fd = new FormData();
                 $scope.loading = true;

                 $scope.formData.file = files[0].name;
                 //Take the first selected file
                 fd.append("file", files[0]);
                 //console.log(fd);

                 $http.post('/admin/exercises', fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loading = false;
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

         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/admin/exercises', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' Your item created successfully' });
                     $window.location.href = '#homeworks/'+ $routeParams.courseId ;
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href = '#homeworks/'+ $routeParams.courseId ;
         };
    });
