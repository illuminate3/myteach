angular.module('teacherApp')
    .factory('booksFactory',function($http){
        var factory ={};
        factory.getBooks = function(){
            return $http.get('/admin/books');
        };
        factory.getSingleBooks = function(id){
            return $http.get('/admin/books/show/'+id);
        };


        factory.active = function(id){
            return $http.get('/admin/books/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/admin/books/'+id);
        };
        return factory;
    });