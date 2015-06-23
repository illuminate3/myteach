
var teacherApp = angular.module('teacherApp',['ngRoute','ngSanitize'])
    .config(function($routeProvider){
        $routeProvider
            .when('/latest_news/:itemId',
            {
                controller:'NewsController',
                templateUrl:'/js/app/views/news/news.html'
            }
            )
            .when('/courses',
            {
                controller:'CoursesController',
                templateUrl:'/js/app/views/courses/courses.html'
            }
            )
            .when('/farsi',
            {
                controller:'PersianController',
                templateUrl:'/js/app/views/persian/persian.html'
            }
            )
            .when('/resume',
            {
                controller:'CvController',
                templateUrl:'/js/app/views/cv/cv.html'
            }
            )
            .when('/homeworks/:itemId',
            {
                controller:'HomeworksController',
                templateUrl:'/js/app/views/courses/homeworks.html'
            }
            )
            .when('/exercise/:itemId',
            {
                controller:'ExerciseController',
                templateUrl:'/js/app/views/courses/exercise.html'
            }
            )
            .when('/lessons/:itemId',
            {
                controller:'LessonController',
                templateUrl:'/js/app/views/courses/lesson.html'
            }
            )
            .when('/',
            {
                controller:'HomeController',
                templateUrl:'/js/app/views/home/home.html'
            });
    })
    .filter('htmlToPlaintext', function() {
        return function(text) {
            return String(text).replace(/<[^>]+>/gm, '');
        }
    })