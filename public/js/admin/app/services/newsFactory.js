angular.module('teacherApp')
    .factory('newsFactory',function($http){
        var factory ={};
            factory.getNews = function(){
               return $http.get('/admin/getNews');
            };
            factory.getSingleNews = function(id){
                return $http.get('/admin/latest/show/'+id);
            };
            factory.active = function(id){
                return $http.get('/admin/latest/active/'+id);
            };
        factory.deleteItem = function(id){
            return $http.delete('/admin/latest/'+id);
        };
        return factory;
    });