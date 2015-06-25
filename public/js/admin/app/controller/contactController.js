
angular.module('teacherApp')
    .controller('contactController',function($scope,$http,ContactFactory,messageFactory,$filter,$window){
        $scope.messages = [];
        $scope.order = 'created_at';
        $scope.reverse = true;
        $scope.itemSelected='10';
        function init(){
            ContactFactory.getMessages()
                .success(function(data){
                    $scope.messages = data;
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

        $scope.deleteItem = function(id){
            console.log(id);
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                ContactFactory.deleteItem(id)
                    .success(function (data) {
                        //console.log('aaaaaaaaaaa');
                        init();
                       // $window.location.href= "/admin/contact/#/messages";
                    });
            }
        };

        var activeArray = [];
        var ActiveObjects;
        $scope.selectedItems = function () {
            ActiveObjects = $filter('filter')($scope.messages, {checked: true});
            console.log(ActiveObjects);
            // for(var i=0;i<$scope.ActiveObjects.length;i++) {
            //     $http.post('/admin/latest/activeAll', JSON.stringify($scope.ActiveObjects[0]))
            //         .success(function (data) {
            //             console.log(data);
            //         });
            //}
        }

        $scope.deleteAll = function() {
            var a = window.confirm('Are you Sure you want to delete this item?');
            if (a) {
                for (var i = 0; i < ActiveObjects.length; i++) {
                    activeArray.push((ActiveObjects[i].id));
                }
                console.log(activeArray);
                $http.post('/admin/messages/deleteAll', JSON.stringify(activeArray))
                    .success(function (data) {
                        console.log(data);
                        init();
                        //$window.location.href= "/admin/contact/#/messages";
                    });
                activeArray = [];
            };
        }

    });
