
angular.module('teacherApp')
    .controller('booksController',function($scope,$http,booksFactory,messageFactory,$filter){
        $scope.books = [];
        $scope.order = 'created_at';
        $scope.reverse = true;
        $scope.itemSelected='10';
        function init(){
            booksFactory.getBooks()
                .success(function(data){
                    $scope.books = data;
                });
        }
        init();
        // $http.get('/admin/getNews').success(function(data){
        //     $scope.books = data;
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
            booksFactory.active(id)
                .success(function(data){
                    console.log('aaaaaaaaaaa');
                    init();
                });


        };
        $scope.deleteItem = function(id){
            console.log(id);
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                booksFactory.deleteItem(id)
                    .success(function (data) {
                        console.log('aaaaaaaaaaa');
                        init();
                    });
            }
        };

        var activeArray = [];
        var ActiveObjects;
        $scope.selectedItems = function () {
            ActiveObjects = $filter('filter')($scope.books, {checked: true});
            console.log(ActiveObjects);
            // for(var i=0;i<$scope.ActiveObjects.length;i++) {
            //     $http.post('/admin/latest/activeAll', JSON.stringify($scope.ActiveObjects[0]))
            //         .success(function (data) {
            //             console.log(data);
            //         });
            //}
        }
        $scope.activeAll = function(){
            for(var i=0; i < ActiveObjects.length ; i++){
                activeArray.push((ActiveObjects[i].id));
            }
            console.log(activeArray);
            $http.post('/admin/books/activeAll', JSON.stringify(activeArray))
                .success(function (data) {
                    console.log(data);
                    init();
                });
            activeArray = [];

        };

        $scope.deleteAll = function() {
            var a = window.confirm('Are you Sure you want to delete this item?');
            if (a) {
                for (var i = 0; i < ActiveObjects.length; i++) {
                    activeArray.push((ActiveObjects[i].id));
                }
                console.log(activeArray);
                $http.post('/admin/books/deleteAll', JSON.stringify(activeArray))
                    .success(function (data) {
                        console.log(data);
                        init();
                    });
                activeArray = [];
            };
        }

    });
