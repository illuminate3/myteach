
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

         $scope.formData.description = '';

         $scope.tinymceOptions = {

             selector: "textarea#editor1",

             height : '500px',
             language : 'en',
             // selector: "textarea",
             theme: "modern",
             plugins: [
                 "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars code fullscreen",
                 "insertdatetime media nonbreaking save table contextmenu directionality",
                 "emoticons template paste textcolor colorpicker textpattern"
             ],
             toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
             toolbar2: "print preview  | forecolor backcolor emoticons |  fontselect |  fontsizeselect",
             image_advtab: true,
             image_class_list: [
                 {title: 'None', value: ''},
                 {title: 'Image Responsive', value: 'img-responsive'}
             ],
             templates: [
                 {title: 'Test template 1', content: 'Test 1'},
                 {title: 'Test template 2', content: 'Test 2'}
             ],
             file_browser_callback : function(field_name, url, type, win) {
                 // from http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
                 var w = window,
                     d = document,
                     e = d.documentElement,
                     g = d.getElementsByTagName('body')[0],
                     x = w.innerWidth || e.clientWidth || g.clientWidth,
                     y = w.innerHeight|| e.clientHeight|| g.clientHeight;

                 var cmsURL = '/filemanager/show?&field_name='+field_name+'&lang='+tinymce.settings.language;

                 if(type == 'image') {
                     cmsURL = cmsURL + "&type=images";
                 }

                 tinyMCE.activeEditor.windowManager.open({
                     file : cmsURL,
                     title : 'Filemanager',
                     width : x * 0.8,
                     height : y * 0.8,
                     resizable : "yes",
                     close_previous : "no"
                 });

             }
         };
    });
