angular.module('teacherApp')
    .factory('coursesFactory',function($http){
        var factory ={};
        factory.getCourses = function(){
            return $http.get('/admin/courses/all');
        };
        factory.getSingleCourses = function(id){
            return $http.get('/admin/courses/'+id);
        };
        factory.active = function(id){
            return $http.get('/admin/courses/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/admin/courses/'+id);
        };
        return factory;
    });