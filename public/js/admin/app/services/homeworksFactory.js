angular.module('teacherApp')
    .factory('homeworksFactory',function($http){
        var factory ={};
        factory.getCourses = function(id){
            return $http.get('/admin/exercises/all/'+id);
        };
        factory.getSingleHomeworks = function(id){
            return $http.get('/admin/exercises/'+id);
        };
        factory.active = function(id){
            return $http.get('/admin/exercises/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/admin/exercises/'+id);
        };
        return factory;
    });