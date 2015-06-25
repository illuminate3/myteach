angular.module('teacherApp')
    .factory('ContactFactory',function($http){
        var factory ={};
            factory.getMessages = function(){
               return $http.get('/admin/contact/all');
            };
            factory.getSingleMessage = function(id){
                return $http.get('/admin/contact/'+id);
            };
            factory.active = function(id){
                return $http.get('/admin/contact/active/'+id);
            };
        factory.deleteItem = function(id){
            return $http.delete('/admin/contact/'+id);
        };
        return factory;
    });