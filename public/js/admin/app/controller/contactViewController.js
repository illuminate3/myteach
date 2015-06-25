
angular.module('teacherApp')
    .controller('contactViewController',function($scope,$http,ContactFactory,messageFactory,$routeParams,$window){
        $scope.message = {};
        var item  = $routeParams.itemId;
        function init(item){
            ContactFactory.getSingleMessage(item)
                .success(function(data){
                    $scope.message = data;
                });
        }
        init(item);

        $scope.submitForm = function(){
            console.log("posting data....");
            $scope.loading = true;
            $scope.messageSuccess = '';
            $http.put('/admin/contact/' + item, JSON.stringify($scope.message))
                .success(function(data){
                    /*success callback*/
                    $scope.loading = false;
                    $scope.messageSuccess = 'Message is send ';
                    console.log(data);
                    messageFactory.setSuccess({ show: true, msg: 'Message is send' });
                    $window.location.href= "#messages";
                });
        };
        $scope.cancelView = function(){
            $window.location.href= "#messages";
        };

    });
