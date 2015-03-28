angular.module('teacherApp')
    .factory('examsFactory',function($http){
        var factory ={};
        factory.getExams = function(id){
            return $http.get('/admin/exams/all/'+id);
        };
        factory.getSingleExams = function(id){
            return $http.get('/admin/exams/'+id);
        };
        factory.active = function(id){
            return $http.get('/admin/exams/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/admin/exams/'+id);
        };
        return factory;
    });