
 angular.module('teacherApp')
    .controller('newsController',function($scope,$http,newsFactory,messageFactory,$filter){
         $scope.news = [];
         $scope.order = 'title';
         $scope.reverse = false;
         $scope.itemSelected='10';
         function init(){
                newsFactory.getNews()
                    .success(function(data){
                    $scope.news = data;
                });
         }
         init();
         // $http.get('/admin/getNews').success(function(data){
         //     $scope.news = data;
         //});
         $scope.sort = function(name){
            $scope.order = name;
             $scope.reverse = ! $scope.reverse;
         };

         if (messageFactory.hasAlert()) {
             $scope.success = messageFactory.getSuccess();
             messageFactory.reset();
         }

         $scope.active = function(id){
             console.log(id);
             newsFactory.active(id)
                 .success(function(data){
                     console.log('aaaaaaaaaaa');
                     init();
                 });


         };
         $scope.deleteItem = function(id){
             console.log(id);
             var a = window.confirm('Are you Sure you want to delete this item?');
             if(a) {
                 newsFactory.deleteItem(id)
                     .success(function (data) {
                         console.log('aaaaaaaaaaa');
                         init();
                     });
             }
         };

         var activeArray = [];
         var playList;
         $scope.selectedSongs = function () {
              playList = $filter('filter')($scope.news, {checked: true});
             console.log(playList);
            // for(var i=0;i<$scope.playList.length;i++) {
            //     $http.post('/admin/latest/activeAll', JSON.stringify($scope.playList[0]))
            //         .success(function (data) {
            //             console.log(data);
            //         });
             //}
         }
         $scope.activeAll = function(){
             for(var i=0; i < playList.length ; i++){
                 activeArray.push((playList[i].id));
             }
             console.log(activeArray);
                  $http.post('/admin/latest/activeAll', JSON.stringify(activeArray))
                      .success(function (data) {
                          console.log(data);
                          init();
                      });
             activeArray = [];

         };

         $scope.deleteAll = function() {
             var a = window.confirm('Are you Sure you want to delete this item?');
             if (a) {
                 for (var i = 0; i < playList.length; i++) {
                     activeArray.push((playList[i].id));
                 }
                 console.log(activeArray);
                 $http.post('/admin/latest/deleteAll', JSON.stringify(activeArray))
                     .success(function (data) {
                         console.log(data);
                         init();
                     });
                     activeArray = [];
                      };
             }

    });
