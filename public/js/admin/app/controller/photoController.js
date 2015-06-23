
 angular.module('teacherApp')
    .controller('photoController',function($scope,$http,messageFactory,$filter,$window){

         $scope.images = '';
         $scope.loadingMainSlideShow = false;
         $scope.messageSuccessMainSlideShow = '';
         $scope.ErrorssMainSlideShow = '';
         //$scope.tinymceModel = '';

         function init(){
             $http.get('/admin/gallery/all')
                 .success(function(data){
                     $scope.images = data;
                     console.log(data);
                 });
         }
         init();

         $scope.uploadFileMainSlideShow = function(files) {
             $scope.messageSuccessMainSlideShow = '';
             $scope.ErrorssMainSlideShow = '';
             if(files[0].size < 210000) {
                 var fd = new FormData();
                 $scope.loadingMainSlideShow = true;

                 fd.fileMainSlideShow = files[0].name;
                 //Take the first selected file
                 fd.append("fileMainSlideShow", files[0]);
                 //console.log(fd);

                 $http.post('/admin/gallery', fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingMainSlideShow = false;
                     $scope.messageSuccessMainSlideShow = 'Your file uploaded successfully';
                     init();
                 }).error(function () {
                     $scope.loadingMainSlideShow = false;
                     $scope.ErrorssMainSlideShow = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.ErrorssMainSlideShow = 'Your file is bigger than 210 kilobyte';

                 $window.alert('Your can not be bigger than 210 kilobyte')
             }

         };

         $scope.removeSlideShow = function(img){
             if($window.confirm('Do you really want to delete this image? ')){
                 $http.delete('/admin/gallery/'+ img.id)
                     .success(function(data){
                         init();

                     });
             }

         };

         $scope.uploadFileMainSlideShowEdit = function(files,id) {

             $scope.messageSuccessMainSlideShowEidt = '';
             $scope.ErrorssMainSlideShowEdit = '';
             if(files[0].size < 210000) {
                 var fd = new FormData();
                 $scope.loadingMainSlideShowEdit = true;

                 fd.fileMainSlideShowEidt = files[0].name;

                 //Take the first selected file
                 fd.append("fileMainSlideShowEdit", files[0]);
                 //console.log(fd);

                 $http.post('/admin/galleryEdit/' + id, fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 })
                     .success(function (data) {
                    // console.log(data);
                     $scope.loadingMainSlideShowEdit = false;
                     $scope.messageSuccessMainSlideShowEdit = 'Your file uploaded successfully';
                     init();
                 }).error(function () {
                     $scope.loadingMainSlideShowEdit = false;
                     $scope.ErrorssMainSlideShowEdit = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.ErrorssMainSlideShowEdit = 'Your file is bigger than 210 kilobyte';

                 $window.alert('Your picture can not be bigger than 210 kilobyte')
             }

         };




 });
