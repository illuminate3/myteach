angular.module('teacherApp')
    .controller('resumeController', function($scope,$http,$window) {

        $scope.tinymceModel = '';

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

        function init(){
            $http.get('/admin/pages/cv')
                .success(function(data){
                    $scope.tinymceModel = data;
                    console.log(data);
                });
        }
        init();

        $scope.pageArticle = function () {
            $http.post('/admin/cv',JSON.stringify({'description' : $scope.tinymceModel}))
                .success(function () {
                    $window.alert('Homepage Changed Successfully');
                })
        };

    });