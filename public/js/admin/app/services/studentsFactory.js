angular.module('teacherApp')
    .factory('studentsFactory',function($http){
        var factory ={};
        factory.getStudents = function(id){
            return $http.get('/admin/students/all/'+id);
        };
        factory.getStudentWithCourseIdAndExams = function(id,examId){
            return $http.get('/admin/students/gradesCourse/'+id+'/'+examId);
        };
        factory.getSingleStudents = function(id){
            return $http.get('/admin/students/'+id);
        };
        factory.active = function(id){
            return $http.get('/admin/students/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/admin/students/'+id);
        };
        return factory;
    });